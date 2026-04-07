<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

class SimulationRunItem extends JsonSerializableType
{
    /**
     * @var string $id This is the unique identifier for the simulation run item.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the organization.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var string $simulationId This is the ID of the simulation this run belongs to.
     */
    #[JsonProperty('simulationId')]
    public string $simulationId;

    /**
     * @var value-of<SimulationRunItemStatus> $status This is the current status of the run.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var DateTime $queuedAt This is the ISO 8601 date-time string of when the run was queued.
     */
    #[JsonProperty('queuedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $queuedAt;

    /**
     * @var ?DateTime $startedAt This is the ISO 8601 date-time string of when the run started.
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $startedAt;

    /**
     * @var ?DateTime $completedAt This is the ISO 8601 date-time string of when the run completed.
     */
    #[JsonProperty('completedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $completedAt;

    /**
     * @var ?DateTime $failedAt This is the ISO 8601 date-time string of when the run failed.
     */
    #[JsonProperty('failedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $failedAt;

    /**
     * @var ?DateTime $canceledAt This is the ISO 8601 date-time string of when the run was canceled.
     */
    #[JsonProperty('canceledAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $canceledAt;

    /**
     * @var ?string $failureReason This is the reason for failure.
     */
    #[JsonProperty('failureReason')]
    public ?string $failureReason;

    /**
     * @var ?string $callId This is the ID of the target Vapi call (the assistant being tested).
     */
    #[JsonProperty('callId')]
    public ?string $callId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the run item was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the run item was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?string $runId This is the ID of the parent run (batch/group).
     */
    #[JsonProperty('runId')]
    public ?string $runId;

    /**
     * @var ?array<SimulationRunItemHooksItem> $hooks Hooks configured for this simulation run item
     */
    #[JsonProperty('hooks'), ArrayType([SimulationRunItemHooksItem::class])]
    public ?array $hooks;

    /**
     * @var ?float $iterationNumber This is the iteration number (1-indexed) when run with iterations > 1.
     */
    #[JsonProperty('iterationNumber')]
    public ?float $iterationNumber;

    /**
     * @var ?string $sessionId This is the session ID for chat-based simulations (webchat transport).
     */
    #[JsonProperty('sessionId')]
    public ?string $sessionId;

    /**
     * @var ?string $scenarioId This is the scenario ID at run creation time.
     */
    #[JsonProperty('scenarioId')]
    public ?string $scenarioId;

    /**
     * @var ?string $personalityId This is the personality ID at run creation time.
     */
    #[JsonProperty('personalityId')]
    public ?string $personalityId;

    /**
     * @var ?SimulationRunItemMetadata $metadata This is the metadata containing snapshots and call data.
     */
    #[JsonProperty('metadata')]
    public ?SimulationRunItemMetadata $metadata;

    /**
     * @var ?SimulationRunItemResults $results This is the results of the simulation run.
     */
    #[JsonProperty('results')]
    public ?SimulationRunItemResults $results;

    /**
     * @var ?SimulationRunItemImprovements $improvementSuggestions This is the AI-generated improvement suggestions for failed runs.
     */
    #[JsonProperty('improvementSuggestions')]
    public ?SimulationRunItemImprovements $improvementSuggestions;

    /**
     * @var ?SimulationRunConfiguration $configurations This is the configuration for how this simulation run executes.
     */
    #[JsonProperty('configurations')]
    public ?SimulationRunConfiguration $configurations;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   simulationId: string,
     *   status: value-of<SimulationRunItemStatus>,
     *   queuedAt: DateTime,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   startedAt?: ?DateTime,
     *   completedAt?: ?DateTime,
     *   failedAt?: ?DateTime,
     *   canceledAt?: ?DateTime,
     *   failureReason?: ?string,
     *   callId?: ?string,
     *   runId?: ?string,
     *   hooks?: ?array<SimulationRunItemHooksItem>,
     *   iterationNumber?: ?float,
     *   sessionId?: ?string,
     *   scenarioId?: ?string,
     *   personalityId?: ?string,
     *   metadata?: ?SimulationRunItemMetadata,
     *   results?: ?SimulationRunItemResults,
     *   improvementSuggestions?: ?SimulationRunItemImprovements,
     *   configurations?: ?SimulationRunConfiguration,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->simulationId = $values['simulationId'];
        $this->status = $values['status'];
        $this->queuedAt = $values['queuedAt'];
        $this->startedAt = $values['startedAt'] ?? null;
        $this->completedAt = $values['completedAt'] ?? null;
        $this->failedAt = $values['failedAt'] ?? null;
        $this->canceledAt = $values['canceledAt'] ?? null;
        $this->failureReason = $values['failureReason'] ?? null;
        $this->callId = $values['callId'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->runId = $values['runId'] ?? null;
        $this->hooks = $values['hooks'] ?? null;
        $this->iterationNumber = $values['iterationNumber'] ?? null;
        $this->sessionId = $values['sessionId'] ?? null;
        $this->scenarioId = $values['scenarioId'] ?? null;
        $this->personalityId = $values['personalityId'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->results = $values['results'] ?? null;
        $this->improvementSuggestions = $values['improvementSuggestions'] ?? null;
        $this->configurations = $values['configurations'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
