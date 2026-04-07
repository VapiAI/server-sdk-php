<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunItemCounts extends JsonSerializableType
{
    /**
     * @var float $total Total number of run items
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var float $passed Number of passed run items
     */
    #[JsonProperty('passed')]
    public float $passed;

    /**
     * @var float $failed Number of failed run items
     */
    #[JsonProperty('failed')]
    public float $failed;

    /**
     * @var float $running Number of running/evaluating run items
     */
    #[JsonProperty('running')]
    public float $running;

    /**
     * @var float $queued Number of queued run items
     */
    #[JsonProperty('queued')]
    public float $queued;

    /**
     * @var float $canceled Number of canceled run items
     */
    #[JsonProperty('canceled')]
    public float $canceled;

    /**
     * @param array{
     *   total: float,
     *   passed: float,
     *   failed: float,
     *   running: float,
     *   queued: float,
     *   canceled: float,
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
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
