<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class CreateScenarioDtoHooksItem extends JsonSerializableType
{
    /**
     * @var (
     *    'simulation.run.started'
     *   |'simulation.run.ended'
     *   |'_unknown'
     * ) $on
     */
    public readonly string $on;

    /**
     * @var (
     *    SimulationHookCallStarted
     *   |SimulationHookCallEnded
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   on: (
     *    'simulation.run.started'
     *   |'simulation.run.ended'
     *   |'_unknown'
     * ),
     *   value: (
     *    SimulationHookCallStarted
     *   |SimulationHookCallEnded
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->on = $values['on'];
        $this->value = $values['value'];
    }

    /**
     * @param SimulationHookCallStarted $simulationRunStarted
     * @return CreateScenarioDtoHooksItem
     */
    public static function simulationRunStarted(SimulationHookCallStarted $simulationRunStarted): CreateScenarioDtoHooksItem
    {
        return new CreateScenarioDtoHooksItem([
            'on' => 'simulation.run.started',
            'value' => $simulationRunStarted,
        ]);
    }

    /**
     * @param SimulationHookCallEnded $simulationRunEnded
     * @return CreateScenarioDtoHooksItem
     */
    public static function simulationRunEnded(SimulationHookCallEnded $simulationRunEnded): CreateScenarioDtoHooksItem
    {
        return new CreateScenarioDtoHooksItem([
            'on' => 'simulation.run.ended',
            'value' => $simulationRunEnded,
        ]);
    }

    /**
     * @return bool
     */
    public function isSimulationRunStarted(): bool
    {
        return $this->value instanceof SimulationHookCallStarted && $this->on === 'simulation.run.started';
    }

    /**
     * @return SimulationHookCallStarted
     */
    public function asSimulationRunStarted(): SimulationHookCallStarted
    {
        if (!($this->value instanceof SimulationHookCallStarted && $this->on === 'simulation.run.started')) {
            throw new Exception(
                "Expected simulation.run.started; got " . $this->on . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSimulationRunEnded(): bool
    {
        return $this->value instanceof SimulationHookCallEnded && $this->on === 'simulation.run.ended';
    }

    /**
     * @return SimulationHookCallEnded
     */
    public function asSimulationRunEnded(): SimulationHookCallEnded
    {
        if (!($this->value instanceof SimulationHookCallEnded && $this->on === 'simulation.run.ended')) {
            throw new Exception(
                "Expected simulation.run.ended; got " . $this->on . " with value of type " . get_debug_type($this->value),
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
        $result['on'] = $this->on;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->on) {
            case 'simulation.run.started':
                $value = $this->asSimulationRunStarted()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'simulation.run.ended':
                $value = $this->asSimulationRunEnded()->jsonSerialize();
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
        if (!array_key_exists('on', $data)) {
            throw new Exception(
                "JSON data is missing property 'on'",
            );
        }
        $on = $data['on'];
        if (!(is_string($on))) {
            throw new Exception(
                "Expected property 'on' in JSON data to be string, instead received " . get_debug_type($data['on']),
            );
        }

        $args['on'] = $on;
        switch ($on) {
            case 'simulation.run.started':
                $args['value'] = SimulationHookCallStarted::jsonDeserialize($data);
                break;
            case 'simulation.run.ended':
                $args['value'] = SimulationHookCallEnded::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['on'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
