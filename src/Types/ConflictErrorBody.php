<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class ConflictErrorBody extends JsonSerializableType
{
    /**
     * @var (
     *    'tool_pinned'
     *   |'tool_write_conflict'
     *   |'_unknown'
     * ) $error
     */
    public readonly string $error;

    /**
     * @var (
     *    ToolPinnedConflictResponseDto
     *   |ToolWriteConflictResponseDto
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   error: (
     *    'tool_pinned'
     *   |'tool_write_conflict'
     *   |'_unknown'
     * ),
     *   value: (
     *    ToolPinnedConflictResponseDto
     *   |ToolWriteConflictResponseDto
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->value = $values['value'];
    }

    /**
     * @param ToolPinnedConflictResponseDto $toolPinned
     * @return ConflictErrorBody
     */
    public static function toolPinned(ToolPinnedConflictResponseDto $toolPinned): ConflictErrorBody
    {
        return new ConflictErrorBody([
            'error' => 'tool_pinned',
            'value' => $toolPinned,
        ]);
    }

    /**
     * @param ToolWriteConflictResponseDto $toolWriteConflict
     * @return ConflictErrorBody
     */
    public static function toolWriteConflict(ToolWriteConflictResponseDto $toolWriteConflict): ConflictErrorBody
    {
        return new ConflictErrorBody([
            'error' => 'tool_write_conflict',
            'value' => $toolWriteConflict,
        ]);
    }

    /**
     * @return bool
     */
    public function isToolPinned(): bool
    {
        return $this->value instanceof ToolPinnedConflictResponseDto && $this->error === 'tool_pinned';
    }

    /**
     * @return ToolPinnedConflictResponseDto
     */
    public function asToolPinned(): ToolPinnedConflictResponseDto
    {
        if (!($this->value instanceof ToolPinnedConflictResponseDto && $this->error === 'tool_pinned')) {
            throw new Exception(
                "Expected tool_pinned; got " . $this->error . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isToolWriteConflict(): bool
    {
        return $this->value instanceof ToolWriteConflictResponseDto && $this->error === 'tool_write_conflict';
    }

    /**
     * @return ToolWriteConflictResponseDto
     */
    public function asToolWriteConflict(): ToolWriteConflictResponseDto
    {
        if (!($this->value instanceof ToolWriteConflictResponseDto && $this->error === 'tool_write_conflict')) {
            throw new Exception(
                "Expected tool_write_conflict; got " . $this->error . " with value of type " . get_debug_type($this->value),
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
        $result['error'] = $this->error;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->error) {
            case 'tool_pinned':
                $value = $this->asToolPinned()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'tool_write_conflict':
                $value = $this->asToolWriteConflict()->jsonSerialize();
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
        if (!array_key_exists('error', $data)) {
            throw new Exception(
                "JSON data is missing property 'error'",
            );
        }
        $error = $data['error'];
        if (!(is_string($error))) {
            throw new Exception(
                "Expected property 'error' in JSON data to be string, instead received " . get_debug_type($data['error']),
            );
        }

        $args['error'] = $error;
        switch ($error) {
            case 'tool_pinned':
                $args['value'] = ToolPinnedConflictResponseDto::jsonDeserialize($data);
                break;
            case 'tool_write_conflict':
                $args['value'] = ToolWriteConflictResponseDto::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['error'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
