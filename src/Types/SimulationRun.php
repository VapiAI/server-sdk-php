<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

class SimulationRun extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier for the run
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId Organization ID
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var value-of<SimulationRunStatus> $status Current status of the run
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var DateTime $queuedAt When the run was queued
     */
    #[JsonProperty('queuedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $queuedAt;

    /**
     * @var ?DateTime $startedAt When the run started
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var ?DateTime $endedAt When the run ended
     */
    #[JsonProperty('endedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $endedAt;

    /**
     * @var ?string $endedReason Reason the run ended
     */
    #[JsonProperty('endedReason')]
    public ?string $endedReason;

    /**
     * @var DateTime $createdAt ISO 8601 date-time when created
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt ISO 8601 date-time when last updated
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?SimulationRunItemCounts $itemCounts Aggregate counts of run items by status
     */
    #[JsonProperty('itemCounts')]
    public ?SimulationRunItemCounts $itemCounts;

    /**
     * @var array<SimulationRunSimulationsItem> $simulations Array of simulations and/or suites to run
     */
    #[JsonProperty('simulations'), ArrayType([SimulationRunSimulationsItem::class])]
    public array $simulations;

    /**
     * @var SimulationRunTarget $target Target to test against
     */
    #[JsonProperty('target')]
    public SimulationRunTarget $target;

    /**
     * @var ?float $iterations Number of times to run each simulation (default: 1)
     */
    #[JsonProperty('iterations')]
    public ?float $iterations;

    /**
     * @var ?SimulationRunTransportConfiguration $transport Transport configuration for the simulation runs
     */
    #[JsonProperty('transport')]
    public ?SimulationRunTransportConfiguration $transport;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   status: value-of<SimulationRunStatus>,
     *   queuedAt: DateTime,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   simulations: array<SimulationRunSimulationsItem>,
     *   target: SimulationRunTarget,
     *   startedAt?: ?DateTime,
     *   endedAt?: ?DateTime,
     *   endedReason?: ?string,
     *   itemCounts?: ?SimulationRunItemCounts,
     *   iterations?: ?float,
     *   transport?: ?SimulationRunTransportConfiguration,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->status = $values['status'];
        $this->queuedAt = $values['queuedAt'];
        $this->startedAt = $values['startedAt'] ?? null;
        $this->endedAt = $values['endedAt'] ?? null;
        $this->endedReason = $values['endedReason'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->itemCounts = $values['itemCounts'] ?? null;
        $this->simulations = $values['simulations'];
        $this->target = $values['target'];
        $this->iterations = $values['iterations'] ?? null;
        $this->transport = $values['transport'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
