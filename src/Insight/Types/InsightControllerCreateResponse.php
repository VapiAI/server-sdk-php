<?php

namespace Vapi\Insight\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Types\BarInsight;
use Vapi\Types\PieInsight;
use Vapi\Types\LineInsight;
use Vapi\Types\TextInsight;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class InsightControllerCreateResponse extends JsonSerializableType
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
     *    BarInsight
     *   |PieInsight
     *   |LineInsight
     *   |TextInsight
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
     *    BarInsight
     *   |PieInsight
     *   |LineInsight
     *   |TextInsight
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
     * @param BarInsight $bar
     * @return InsightControllerCreateResponse
     */
    public static function bar(BarInsight $bar): InsightControllerCreateResponse
    {
        return new InsightControllerCreateResponse([
            'type' => 'bar',
            'value' => $bar,
        ]);
    }

    /**
     * @param PieInsight $pie
     * @return InsightControllerCreateResponse
     */
    public static function pie(PieInsight $pie): InsightControllerCreateResponse
    {
        return new InsightControllerCreateResponse([
            'type' => 'pie',
            'value' => $pie,
        ]);
    }

    /**
     * @param LineInsight $line
     * @return InsightControllerCreateResponse
     */
    public static function line(LineInsight $line): InsightControllerCreateResponse
    {
        return new InsightControllerCreateResponse([
            'type' => 'line',
            'value' => $line,
        ]);
    }

    /**
     * @param TextInsight $text
     * @return InsightControllerCreateResponse
     */
    public static function text(TextInsight $text): InsightControllerCreateResponse
    {
        return new InsightControllerCreateResponse([
            'type' => 'text',
            'value' => $text,
        ]);
    }

    /**
     * @return bool
     */
    public function isBar(): bool
    {
        return $this->value instanceof BarInsight && $this->type === 'bar';
    }

    /**
     * @return BarInsight
     */
    public function asBar(): BarInsight
    {
        if (!($this->value instanceof BarInsight && $this->type === 'bar')) {
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
        return $this->value instanceof PieInsight && $this->type === 'pie';
    }

    /**
     * @return PieInsight
     */
    public function asPie(): PieInsight
    {
        if (!($this->value instanceof PieInsight && $this->type === 'pie')) {
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
        return $this->value instanceof LineInsight && $this->type === 'line';
    }

    /**
     * @return LineInsight
     */
    public function asLine(): LineInsight
    {
        if (!($this->value instanceof LineInsight && $this->type === 'line')) {
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
        return $this->value instanceof TextInsight && $this->type === 'text';
    }

    /**
     * @return TextInsight
     */
    public function asText(): TextInsight
    {
        if (!($this->value instanceof TextInsight && $this->type === 'text')) {
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
                $args['value'] = BarInsight::jsonDeserialize($data);
                break;
            case 'pie':
                $args['value'] = PieInsight::jsonDeserialize($data);
                break;
            case 'line':
                $args['value'] = LineInsight::jsonDeserialize($data);
                break;
            case 'text':
                $args['value'] = TextInsight::jsonDeserialize($data);
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
