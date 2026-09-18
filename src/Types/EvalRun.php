<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

/**
 * A record of an eval execution, including its target, status, results, costs, completion details, and lifecycle timestamps.
 */
class EvalRun extends JsonSerializableType
{
    /**
     * This is the status of the eval run. When an eval run is created, the status is 'running'.
     * When the eval run is completed, the status is 'ended'.
     *
     * @var value-of<EvalRunStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * This is the reason for the eval run to end.
     * When the eval run is completed normally i.e end of mock conversation, the status is 'mockConversation.done'.
     * When the eval fails due to an error like Chat error or incorrect configuration, the status is 'error'.
     * When the eval runs for too long, due to model issues or tool call issues, the status is 'timeout'.
     * When the eval run is cancelled by the user, the status is 'cancelled'.
     * When the eval run is cancelled by Vapi for any reason, the status is 'aborted'.
     *
     * @var value-of<EvalRunEndedReason> $endedReason
     */
    #[JsonProperty('endedReason')]
    public string $endedReason;

    /**
     * @var ?CreateEvalDto $eval This is the transient eval that will be run
     */
    #[JsonProperty('eval')]
    public ?CreateEvalDto $eval;

    /**
     * @var EvalRunTarget $target This is the target that will be run against the eval
     */
    #[JsonProperty('target')]
    public EvalRunTarget $target;

    /**
     * @var string $id The unique identifier for the eval run.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId The unique identifier for the organization that owns the run.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt The ISO 8601 timestamp when the eval run was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $startedAt The ISO 8601 timestamp when the eval run started.
     */
    #[JsonProperty('startedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $startedAt;

    /**
     * @var DateTime $endedAt The ISO 8601 timestamp when the eval run ended.
     */
    #[JsonProperty('endedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $endedAt;

    /**
     * @var ?string $endedMessage This is the ended message when the eval run ended for any reason apart from mockConversation.done
     */
    #[JsonProperty('endedMessage')]
    public ?string $endedMessage;

    /**
     * @var array<EvalRunResult> $results Results for this individual Eval. Check them after status is ended. An Eval that finishes normally contains one result; it passes only when all judged checkpoints pass. Grouping multiple Evals requires your own orchestration, not an Eval suite.
     */
    #[JsonProperty('results'), ArrayType([EvalRunResult::class])]
    public array $results;

    /**
     * @var float $cost The cost of this Eval run in USD.
     */
    #[JsonProperty('cost')]
    public float $cost;

    /**
     * @var array<array<string, mixed>> $costs The cost breakdown for this Eval run.
     */
    #[JsonProperty('costs'), ArrayType([['string' => 'mixed']])]
    public array $costs;

    /**
     * This is the type of the run.
     * Currently it is fixed to `eval`.
     *
     * @var value-of<EvalRunType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $evalId This is the id of the eval that will be run.
     */
    #[JsonProperty('evalId')]
    public ?string $evalId;

    /**
     * @param array{
     *   status: value-of<EvalRunStatus>,
     *   endedReason: value-of<EvalRunEndedReason>,
     *   target: EvalRunTarget,
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   startedAt: DateTime,
     *   endedAt: DateTime,
     *   results: array<EvalRunResult>,
     *   cost: float,
     *   costs: array<array<string, mixed>>,
     *   type: value-of<EvalRunType>,
     *   eval?: ?CreateEvalDto,
     *   endedMessage?: ?string,
     *   evalId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
        $this->endedReason = $values['endedReason'];
        $this->eval = $values['eval'] ?? null;
        $this->target = $values['target'];
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->startedAt = $values['startedAt'];
        $this->endedAt = $values['endedAt'];
        $this->endedMessage = $values['endedMessage'] ?? null;
        $this->results = $values['results'];
        $this->cost = $values['cost'];
        $this->costs = $values['costs'];
        $this->type = $values['type'];
        $this->evalId = $values['evalId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
