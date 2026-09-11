<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class StructuredOutputConditionsItem extends JsonSerializableType
{
    /**
     * @var (
     *    'minMessages'
     *   |'minCallDuration'
     *   |'endedReason'
     *   |'_unknown'
     * ) $type
     */
    public readonly string $type;

    /**
     * @var (
     *    MinMessagesCondition
     *   |MinCallDurationCondition
     *   |EndedReasonCondition
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'minMessages'
     *   |'minCallDuration'
     *   |'endedReason'
     *   |'_unknown'
     * ),
     *   value: (
     *    MinMessagesCondition
     *   |MinCallDurationCondition
     *   |EndedReasonCondition
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
     * @param MinMessagesCondition $minMessages
     * @return StructuredOutputConditionsItem
     */
    public static function minMessages(MinMessagesCondition $minMessages): StructuredOutputConditionsItem
    {
        return new StructuredOutputConditionsItem([
            'type' => 'minMessages',
            'value' => $minMessages,
        ]);
    }

    /**
     * @param MinCallDurationCondition $minCallDuration
     * @return StructuredOutputConditionsItem
     */
    public static function minCallDuration(MinCallDurationCondition $minCallDuration): StructuredOutputConditionsItem
    {
        return new StructuredOutputConditionsItem([
            'type' => 'minCallDuration',
            'value' => $minCallDuration,
        ]);
    }

    /**
     * @param EndedReasonCondition $endedReason
     * @return StructuredOutputConditionsItem
     */
    public static function endedReason(EndedReasonCondition $endedReason): StructuredOutputConditionsItem
    {
        return new StructuredOutputConditionsItem([
            'type' => 'endedReason',
            'value' => $endedReason,
        ]);
    }

    /**
     * @return bool
     */
    public function isMinMessages(): bool
    {
        return $this->value instanceof MinMessagesCondition && $this->type === 'minMessages';
    }

    /**
     * @return MinMessagesCondition
     */
    public function asMinMessages(): MinMessagesCondition
    {
        if (!($this->value instanceof MinMessagesCondition && $this->type === 'minMessages')) {
            throw new Exception(
                "Expected minMessages; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isMinCallDuration(): bool
    {
        return $this->value instanceof MinCallDurationCondition && $this->type === 'minCallDuration';
    }

    /**
     * @return MinCallDurationCondition
     */
    public function asMinCallDuration(): MinCallDurationCondition
    {
        if (!($this->value instanceof MinCallDurationCondition && $this->type === 'minCallDuration')) {
            throw new Exception(
                "Expected minCallDuration; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEndedReason(): bool
    {
        return $this->value instanceof EndedReasonCondition && $this->type === 'endedReason';
    }

    /**
     * @return EndedReasonCondition
     */
    public function asEndedReason(): EndedReasonCondition
    {
        if (!($this->value instanceof EndedReasonCondition && $this->type === 'endedReason')) {
            throw new Exception(
                "Expected endedReason; got " . $this->type . " with value of type " . get_debug_type($this->value),
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
            case 'minMessages':
                $value = $this->asMinMessages()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'minCallDuration':
                $value = $this->asMinCallDuration()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'endedReason':
                $value = $this->asEndedReason()->jsonSerialize();
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
            case 'minMessages':
                $args['value'] = MinMessagesCondition::jsonDeserialize($data);
                break;
            case 'minCallDuration':
                $args['value'] = MinCallDurationCondition::jsonDeserialize($data);
                break;
            case 'endedReason':
                $args['value'] = EndedReasonCondition::jsonDeserialize($data);
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
