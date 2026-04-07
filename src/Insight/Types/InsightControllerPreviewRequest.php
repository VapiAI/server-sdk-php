<?php

namespace Vapi\Insight\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Types\CreateBarInsightFromCallTableDto;
use Vapi\Types\CreatePieInsightFromCallTableDto;
use Vapi\Types\CreateLineInsightFromCallTableDto;
use Vapi\Types\CreateTextInsightFromCallTableDto;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class InsightControllerPreviewRequest extends JsonSerializableType
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
     *    CreateBarInsightFromCallTableDto
     *   |CreatePieInsightFromCallTableDto
     *   |CreateLineInsightFromCallTableDto
     *   |CreateTextInsightFromCallTableDto
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
     *    CreateBarInsightFromCallTableDto
     *   |CreatePieInsightFromCallTableDto
     *   |CreateLineInsightFromCallTableDto
     *   |CreateTextInsightFromCallTableDto
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
     * @param CreateBarInsightFromCallTableDto $bar
     * @return InsightControllerPreviewRequest
     */
    public static function bar(CreateBarInsightFromCallTableDto $bar): InsightControllerPreviewRequest
    {
        return new InsightControllerPreviewRequest([
            'type' => 'bar',
            'value' => $bar,
        ]);
    }

    /**
     * @param CreatePieInsightFromCallTableDto $pie
     * @return InsightControllerPreviewRequest
     */
    public static function pie(CreatePieInsightFromCallTableDto $pie): InsightControllerPreviewRequest
    {
        return new InsightControllerPreviewRequest([
            'type' => 'pie',
            'value' => $pie,
        ]);
    }

    /**
     * @param CreateLineInsightFromCallTableDto $line
     * @return InsightControllerPreviewRequest
     */
    public static function line(CreateLineInsightFromCallTableDto $line): InsightControllerPreviewRequest
    {
        return new InsightControllerPreviewRequest([
            'type' => 'line',
            'value' => $line,
        ]);
    }

    /**
     * @param CreateTextInsightFromCallTableDto $text
     * @return InsightControllerPreviewRequest
     */
    public static function text(CreateTextInsightFromCallTableDto $text): InsightControllerPreviewRequest
    {
        return new InsightControllerPreviewRequest([
            'type' => 'text',
            'value' => $text,
        ]);
    }

    /**
     * @return bool
     */
    public function isBar(): bool
    {
        return $this->value instanceof CreateBarInsightFromCallTableDto && $this->type === 'bar';
    }

    /**
     * @return CreateBarInsightFromCallTableDto
     */
    public function asBar(): CreateBarInsightFromCallTableDto
    {
        if (!($this->value instanceof CreateBarInsightFromCallTableDto && $this->type === 'bar')) {
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
        return $this->value instanceof CreatePieInsightFromCallTableDto && $this->type === 'pie';
    }

    /**
     * @return CreatePieInsightFromCallTableDto
     */
    public function asPie(): CreatePieInsightFromCallTableDto
    {
        if (!($this->value instanceof CreatePieInsightFromCallTableDto && $this->type === 'pie')) {
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
        return $this->value instanceof CreateLineInsightFromCallTableDto && $this->type === 'line';
    }

    /**
     * @return CreateLineInsightFromCallTableDto
     */
    public function asLine(): CreateLineInsightFromCallTableDto
    {
        if (!($this->value instanceof CreateLineInsightFromCallTableDto && $this->type === 'line')) {
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
        return $this->value instanceof CreateTextInsightFromCallTableDto && $this->type === 'text';
    }

    /**
     * @return CreateTextInsightFromCallTableDto
     */
    public function asText(): CreateTextInsightFromCallTableDto
    {
        if (!($this->value instanceof CreateTextInsightFromCallTableDto && $this->type === 'text')) {
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
                $args['value'] = CreateBarInsightFromCallTableDto::jsonDeserialize($data);
                break;
            case 'pie':
                $args['value'] = CreatePieInsightFromCallTableDto::jsonDeserialize($data);
                break;
            case 'line':
                $args['value'] = CreateLineInsightFromCallTableDto::jsonDeserialize($data);
                break;
            case 'text':
                $args['value'] = CreateTextInsightFromCallTableDto::jsonDeserialize($data);
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
