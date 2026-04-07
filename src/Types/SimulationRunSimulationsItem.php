<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class SimulationRunSimulationsItem extends JsonSerializableType
{
    /**
     * @var (
     *    'simulation'
     *   |'simulationSuite'
     *   |'_unknown'
     * ) $type
     */
    public readonly string $type;

    /**
     * @var (
     *    SimulationRunSimulationEntry
     *   |SimulationRunSuiteEntry
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'simulation'
     *   |'simulationSuite'
     *   |'_unknown'
     * ),
     *   value: (
     *    SimulationRunSimulationEntry
     *   |SimulationRunSuiteEntry
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
     * @param SimulationRunSimulationEntry $simulation
     * @return SimulationRunSimulationsItem
     */
    public static function simulation(SimulationRunSimulationEntry $simulation): SimulationRunSimulationsItem
    {
        return new SimulationRunSimulationsItem([
            'type' => 'simulation',
            'value' => $simulation,
        ]);
    }

    /**
     * @param SimulationRunSuiteEntry $simulationSuite
     * @return SimulationRunSimulationsItem
     */
    public static function simulationSuite(SimulationRunSuiteEntry $simulationSuite): SimulationRunSimulationsItem
    {
        return new SimulationRunSimulationsItem([
            'type' => 'simulationSuite',
            'value' => $simulationSuite,
        ]);
    }

    /**
     * @return bool
     */
    public function isSimulation(): bool
    {
        return $this->value instanceof SimulationRunSimulationEntry && $this->type === 'simulation';
    }

    /**
     * @return SimulationRunSimulationEntry
     */
    public function asSimulation(): SimulationRunSimulationEntry
    {
        if (!($this->value instanceof SimulationRunSimulationEntry && $this->type === 'simulation')) {
            throw new Exception(
                "Expected simulation; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSimulationSuite(): bool
    {
        return $this->value instanceof SimulationRunSuiteEntry && $this->type === 'simulationSuite';
    }

    /**
     * @return SimulationRunSuiteEntry
     */
    public function asSimulationSuite(): SimulationRunSuiteEntry
    {
        if (!($this->value instanceof SimulationRunSuiteEntry && $this->type === 'simulationSuite')) {
            throw new Exception(
                "Expected simulationSuite; got " . $this->type . " with value of type " . get_debug_type($this->value),
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
            case 'simulation':
                $value = $this->asSimulation()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'simulationSuite':
                $value = $this->asSimulationSuite()->jsonSerialize();
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
            case 'simulation':
                $args['value'] = SimulationRunSimulationEntry::jsonDeserialize($data);
                break;
            case 'simulationSuite':
                $args['value'] = SimulationRunSuiteEntry::jsonDeserialize($data);
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
