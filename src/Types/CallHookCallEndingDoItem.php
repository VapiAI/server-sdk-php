<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class CallHookCallEndingDoItem extends JsonSerializableType
{
    /**
     * @var (
     *    'tool'
     *   |'message.add'
     *   |'_unknown'
     * ) $type
     */
    public readonly string $type;

    /**
     * @var (
     *    ToolCallHookAction
     *   |MessageAddHookAction
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'tool'
     *   |'message.add'
     *   |'_unknown'
     * ),
     *   value: (
     *    ToolCallHookAction
     *   |MessageAddHookAction
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->value = $values['value'];
    }

    /**
     * @param ToolCallHookAction $tool
     * @return CallHookCallEndingDoItem
     */
    public static function tool(ToolCallHookAction $tool): CallHookCallEndingDoItem
    {
        return new CallHookCallEndingDoItem([
            'type' => 'tool',
            'value' => $tool,
        ]);
    }

    /**
     * @param MessageAddHookAction $messageAdd
     * @return CallHookCallEndingDoItem
     */
    public static function messageAdd(MessageAddHookAction $messageAdd): CallHookCallEndingDoItem
    {
        return new CallHookCallEndingDoItem([
            'type' => 'message.add',
            'value' => $messageAdd,
        ]);
    }

    /**
     * @return bool
     */
    public function isTool(): bool
    {
        return $this->value instanceof ToolCallHookAction && $this->type === 'tool';
    }

    /**
     * @return ToolCallHookAction
     */
    public function asTool(): ToolCallHookAction
    {
        if (!($this->value instanceof ToolCallHookAction && $this->type === 'tool')) {
            throw new Exception(
                "Expected tool; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isMessageAdd(): bool
    {
        return $this->value instanceof MessageAddHookAction && $this->type === 'message.add';
    }

    /**
     * @return MessageAddHookAction
     */
    public function asMessageAdd(): MessageAddHookAction
    {
        if (!($this->value instanceof MessageAddHookAction && $this->type === 'message.add')) {
            throw new Exception(
                "Expected message.add; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['type'] = $this->type;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->type) {
            case 'tool':
                $value = $this->asTool()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'message.add':
                $value = $this->asMessageAdd()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param string $json
     */
    public static function fromJson(string $json): static
    {
        $decodedJson = JsonDecoder::decode($json);
        if (!is_array($decodedJson)) {
            throw new Exception("Unexpected non-array decoded type: " . gettype($decodedJson));
        }
        return self::jsonDeserialize($decodedJson);
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('type', $data)) {
            throw new Exception(
                "JSON data is missing property 'type'",
            );
        }
        $type = $data['type'];
        if (!(is_string($type))) {
            throw new Exception(
                "Expected property 'type' in JSON data to be string, instead received " . get_debug_type($data['type']),
            );
        }

        $args['type'] = $type;
        switch ($type) {
            case 'tool':
                $args['value'] = ToolCallHookAction::jsonDeserialize($data);
                break;
            case 'message.add':
                $args['value'] = MessageAddHookAction::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['type'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
