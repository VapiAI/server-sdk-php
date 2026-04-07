<?php

namespace Vapi\Insight\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Types\UpdateBarInsightFromCallTableDto;
use Vapi\Types\UpdatePieInsightFromCallTableDto;
use Vapi\Types\UpdateLineInsightFromCallTableDto;
use Vapi\Types\UpdateTextInsightFromCallTableDto;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class InsightControllerUpdateRequestBody extends JsonSerializableType
{
    /**
     * @var (
     *    'bar'
     *   |'pie'
     *   |'line'
     *   |'text'
     *   |'_unknown'
     * ) $type
     */
    public readonly string $type;

    /**
     * @var (
     *    UpdateBarInsightFromCallTableDto
     *   |UpdatePieInsightFromCallTableDto
     *   |UpdateLineInsightFromCallTableDto
     *   |UpdateTextInsightFromCallTableDto
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'bar'
     *   |'pie'
     *   |'line'
     *   |'text'
     *   |'_unknown'
     * ),
     *   value: (
     *    UpdateBarInsightFromCallTableDto
     *   |UpdatePieInsightFromCallTableDto
     *   |UpdateLineInsightFromCallTableDto
     *   |UpdateTextInsightFromCallTableDto
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
     * @param UpdateBarInsightFromCallTableDto $bar
     * @return InsightControllerUpdateRequestBody
     */
    public static function bar(UpdateBarInsightFromCallTableDto $bar): InsightControllerUpdateRequestBody
    {
        return new InsightControllerUpdateRequestBody([
            'type' => 'bar',
            'value' => $bar,
        ]);
    }

    /**
     * @param UpdatePieInsightFromCallTableDto $pie
     * @return InsightControllerUpdateRequestBody
     */
    public static function pie(UpdatePieInsightFromCallTableDto $pie): InsightControllerUpdateRequestBody
    {
        return new InsightControllerUpdateRequestBody([
            'type' => 'pie',
            'value' => $pie,
        ]);
    }

    /**
     * @param UpdateLineInsightFromCallTableDto $line
     * @return InsightControllerUpdateRequestBody
     */
    public static function line(UpdateLineInsightFromCallTableDto $line): InsightControllerUpdateRequestBody
    {
        return new InsightControllerUpdateRequestBody([
            'type' => 'line',
            'value' => $line,
        ]);
    }

    /**
     * @param UpdateTextInsightFromCallTableDto $text
     * @return InsightControllerUpdateRequestBody
     */
    public static function text(UpdateTextInsightFromCallTableDto $text): InsightControllerUpdateRequestBody
    {
        return new InsightControllerUpdateRequestBody([
            'type' => 'text',
            'value' => $text,
        ]);
    }

    /**
     * @return bool
     */
    public function isBar(): bool
    {
        return $this->value instanceof UpdateBarInsightFromCallTableDto && $this->type === 'bar';
    }

    /**
     * @return UpdateBarInsightFromCallTableDto
     */
    public function asBar(): UpdateBarInsightFromCallTableDto
    {
        if (!($this->value instanceof UpdateBarInsightFromCallTableDto && $this->type === 'bar')) {
            throw new Exception(
                "Expected bar; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPie(): bool
    {
        return $this->value instanceof UpdatePieInsightFromCallTableDto && $this->type === 'pie';
    }

    /**
     * @return UpdatePieInsightFromCallTableDto
     */
    public function asPie(): UpdatePieInsightFromCallTableDto
    {
        if (!($this->value instanceof UpdatePieInsightFromCallTableDto && $this->type === 'pie')) {
            throw new Exception(
                "Expected pie; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isLine(): bool
    {
        return $this->value instanceof UpdateLineInsightFromCallTableDto && $this->type === 'line';
    }

    /**
     * @return UpdateLineInsightFromCallTableDto
     */
    public function asLine(): UpdateLineInsightFromCallTableDto
    {
        if (!($this->value instanceof UpdateLineInsightFromCallTableDto && $this->type === 'line')) {
            throw new Exception(
                "Expected line; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isText(): bool
    {
        return $this->value instanceof UpdateTextInsightFromCallTableDto && $this->type === 'text';
    }

    /**
     * @return UpdateTextInsightFromCallTableDto
     */
    public function asText(): UpdateTextInsightFromCallTableDto
    {
        if (!($this->value instanceof UpdateTextInsightFromCallTableDto && $this->type === 'text')) {
            throw new Exception(
                "Expected text; got " . $this->type . " with value of type " . get_debug_type($this->value),
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
            case 'bar':
                $value = $this->asBar()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'pie':
                $value = $this->asPie()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'line':
                $value = $this->asLine()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'text':
                $value = $this->asText()->jsonSerialize();
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
            case 'bar':
                $args['value'] = UpdateBarInsightFromCallTableDto::jsonDeserialize($data);
                break;
            case 'pie':
                $args['value'] = UpdatePieInsightFromCallTableDto::jsonDeserialize($data);
                break;
            case 'line':
                $args['value'] = UpdateLineInsightFromCallTableDto::jsonDeserialize($data);
                break;
            case 'text':
                $args['value'] = UpdateTextInsightFromCallTableDto::jsonDeserialize($data);
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
