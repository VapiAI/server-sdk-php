<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunItemCounts extends JsonSerializableType
{
    /**
     * @var float $total The total number of run items.
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var float $passed The number of run items that passed all required evaluations.
     */
    #[JsonProperty('passed')]
    public float $passed;

    /**
     * @var float $failed The number of run items that failed at least one required evaluation.
     */
    #[JsonProperty('failed')]
    public float $failed;

    /**
     * @var float $running The number of run items currently running or evaluating.
     */
    #[JsonProperty('running')]
    public float $running;

    /**
     * @var float $queued The number of run items waiting to start.
     */
    #[JsonProperty('queued')]
    public float $queued;

    /**
     * @var float $canceled The number of run items that were canceled.
     */
    #[JsonProperty('canceled')]
    public float $canceled;

    /**
     * @var ?float $distinctSimulationTotal Number of distinct simulations represented by the run items. Omitted when any item has no simulation ID.
     */
    #[JsonProperty('distinctSimulationTotal')]
    public ?float $distinctSimulationTotal;

    /**
     * @var ?float $distinctSimulationFailed Number of distinct simulations with a failed or canceled item. Omitted when any item has no simulation ID.
     */
    #[JsonProperty('distinctSimulationFailed')]
    public ?float $distinctSimulationFailed;

    /**
     * @param array{
     *   total: float,
     *   passed: float,
     *   failed: float,
     *   running: float,
     *   queued: float,
     *   canceled: float,
     *   distinctSimulationTotal?: ?float,
     *   distinctSimulationFailed?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->total = $values['total'];
        $this->passed = $values['passed'];
        $this->failed = $values['failed'];
        $this->running = $values['running'];
        $this->queued = $values['queued'];
        $this->canceled = $values['canceled'];
        $this->distinctSimulationTotal = $values['distinctSimulationTotal'] ?? null;
        $this->distinctSimulationFailed = $values['distinctSimulationFailed'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
