<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class SessionCostsItem extends JsonSerializableType
{
    /**
     * @var (
     *    'model'
     *   |'analysis'
     *   |'session'
     *   |'_unknown'
     * ) $type
     */
    public readonly string $type;

    /**
     * @var (
     *    ModelCost
     *   |AnalysisCost
     *   |SessionCost
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'model'
     *   |'analysis'
     *   |'session'
     *   |'_unknown'
     * ),
     *   value: (
     *    ModelCost
     *   |AnalysisCost
     *   |SessionCost
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
     * @param ModelCost $model
     * @return SessionCostsItem
     */
    public static function model(ModelCost $model): SessionCostsItem
    {
        return new SessionCostsItem([
            'type' => 'model',
            'value' => $model,
        ]);
    }

    /**
     * @param AnalysisCost $analysis
     * @return SessionCostsItem
     */
    public static function analysis(AnalysisCost $analysis): SessionCostsItem
    {
        return new SessionCostsItem([
            'type' => 'analysis',
            'value' => $analysis,
        ]);
    }

    /**
     * @param SessionCost $session
     * @return SessionCostsItem
     */
    public static function session(SessionCost $session): SessionCostsItem
    {
        return new SessionCostsItem([
            'type' => 'session',
            'value' => $session,
        ]);
    }

    /**
     * @return bool
     */
    public function isModel(): bool
    {
        return $this->value instanceof ModelCost && $this->type === 'model';
    }

    /**
     * @return ModelCost
     */
    public function asModel(): ModelCost
    {
        if (!($this->value instanceof ModelCost && $this->type === 'model')) {
            throw new Exception(
                "Expected model; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isAnalysis(): bool
    {
        return $this->value instanceof AnalysisCost && $this->type === 'analysis';
    }

    /**
     * @return AnalysisCost
     */
    public function asAnalysis(): AnalysisCost
    {
        if (!($this->value instanceof AnalysisCost && $this->type === 'analysis')) {
            throw new Exception(
                "Expected analysis; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSession(): bool
    {
        return $this->value instanceof SessionCost && $this->type === 'session';
    }

    /**
     * @return SessionCost
     */
    public function asSession(): SessionCost
    {
        if (!($this->value instanceof SessionCost && $this->type === 'session')) {
            throw new Exception(
                "Expected session; got " . $this->type . " with value of type " . get_debug_type($this->value),
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
            case 'model':
                $value = $this->asModel()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'analysis':
                $value = $this->asAnalysis()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'session':
                $value = $this->asSession()->jsonSerialize();
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
            case 'model':
                $args['value'] = ModelCost::jsonDeserialize($data);
                break;
            case 'analysis':
                $args['value'] = AnalysisCost::jsonDeserialize($data);
                break;
            case 'session':
                $args['value'] = SessionCost::jsonDeserialize($data);
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
