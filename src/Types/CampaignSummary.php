<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use DateTime;
use Vapi\Core\Types\Date;

class CampaignSummary extends JsonSerializableType
{
    /**
     * @var value-of<CampaignSummaryStatus> $status This is the status of the campaign.
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?value-of<CampaignSummaryEndedReason> $endedReason This is the explanation for how the campaign ended.
     */
    #[JsonProperty('endedReason')]
    public ?string $endedReason;

    /**
     * @var string $name This is the name of the campaign. This is just for your own reference.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $assistantId This is the assistant ID that will be used for the campaign calls. Note: Only one of assistantId, workflowId, or squadId can be used.
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @var ?string $squadId This is the squad ID that will be used for the campaign calls. Note: Only one of assistantId, workflowId, or squadId can be used.
     */
    #[JsonProperty('squadId')]
    public ?string $squadId;

    /**
     * @var ?string $phoneNumberId This is the phone number ID that will be used for the campaign calls. Required if dialPlan is not provided. Note: phoneNumberId and dialPlan are mutually exclusive.
     */
    #[JsonProperty('phoneNumberId')]
    public ?string $phoneNumberId;

    /**
     * @var ?SchedulePlan $schedulePlan This is the schedule plan for the campaign. Calls will start at startedAt and continue until your organization’s concurrency limit is reached. Any remaining calls will be retried for up to one hour as capacity becomes available. After that hour or after latestAt, whichever comes first, any calls that couldn’t be placed won’t be retried.
     */
    #[JsonProperty('schedulePlan')]
    public ?SchedulePlan $schedulePlan;

    /**
     * @var ?float $maxConcurrency This is the maximum number of concurrent calls that will be made for the campaign. Defaults to 10. Maximum of 500, and may not exceed your organization's concurrency limit.
     */
    #[JsonProperty('maxConcurrency')]
    public ?float $maxConcurrency;

    /**
     * @var ?AssistantOverrides $assistantOverrides These are the overrides for the assistant's settings and template variables for the campaign. Use this when the campaign targets an `assistantId`.
     */
    #[JsonProperty('assistantOverrides')]
    public ?AssistantOverrides $assistantOverrides;

    /**
     * @var ?AssistantOverrides $squadOverrides These are the overrides for the squad and template variables for the campaign. Use this when the campaign targets a `squadId`. Per-contact `squadOverrides` are deep-merged on top of this at dispatch time.
     */
    #[JsonProperty('squadOverrides')]
    public ?AssistantOverrides $squadOverrides;

    /**
     * @var ?Server $server This is the server (URL, auth headers, timeout, etc.) for the campaign webhooks.
     */
    #[JsonProperty('server')]
    public ?Server $server;

    /**
     * @var ?array<value-of<CampaignSummaryServerMessagesItem>> $serverMessages These are the messages that will be sent to your Server URL.
     */
    #[JsonProperty('serverMessages'), ArrayType(['string'])]
    public ?array $serverMessages;

    /**
     * @var ?CampaignPredialPlan $predialPlan This opts the campaign into the blocking `campaign.predial` eligibility webhook. When set, every contact triggers a `campaign.predial` POST to the Server URL before dialing, and the response `{ eligible: boolean }` decides whether the call is placed. Requires `server`. When unset, no pre-dial webhook is sent.
     */
    #[JsonProperty('predialPlan')]
    public ?CampaignPredialPlan $predialPlan;

    /**
     * These are the per-status contact counts for this campaign. Sum them for the
     * campaign's total audience; `pending` plus `dispatched` is what is left to
     * complete.
     *
     * @var ?CampaignContactCounters $contactCounters
     */
    #[JsonProperty('contactCounters')]
    public ?CampaignContactCounters $contactCounters;

    /**
     * These are the call-level outcomes for this campaign — how many contacts
     * were actually dialed, and how many of those a human picked up.
     *
     * @var ?CampaignCallMetrics $callMetrics
     */
    #[JsonProperty('callMetrics')]
    public ?CampaignCallMetrics $callMetrics;

    /**
     * @var string $id This is the unique identifier for the campaign.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that this campaign belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the campaign was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the campaign was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   status: value-of<CampaignSummaryStatus>,
     *   name: string,
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   endedReason?: ?value-of<CampaignSummaryEndedReason>,
     *   assistantId?: ?string,
     *   squadId?: ?string,
     *   phoneNumberId?: ?string,
     *   schedulePlan?: ?SchedulePlan,
     *   maxConcurrency?: ?float,
     *   assistantOverrides?: ?AssistantOverrides,
     *   squadOverrides?: ?AssistantOverrides,
     *   server?: ?Server,
     *   serverMessages?: ?array<value-of<CampaignSummaryServerMessagesItem>>,
     *   predialPlan?: ?CampaignPredialPlan,
     *   contactCounters?: ?CampaignContactCounters,
     *   callMetrics?: ?CampaignCallMetrics,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->status = $values['status'];
        $this->endedReason = $values['endedReason'] ?? null;
        $this->name = $values['name'];
        $this->assistantId = $values['assistantId'] ?? null;
        $this->squadId = $values['squadId'] ?? null;
        $this->phoneNumberId = $values['phoneNumberId'] ?? null;
        $this->schedulePlan = $values['schedulePlan'] ?? null;
        $this->maxConcurrency = $values['maxConcurrency'] ?? null;
        $this->assistantOverrides = $values['assistantOverrides'] ?? null;
        $this->squadOverrides = $values['squadOverrides'] ?? null;
        $this->server = $values['server'] ?? null;
        $this->serverMessages = $values['serverMessages'] ?? null;
        $this->predialPlan = $values['predialPlan'] ?? null;
        $this->contactCounters = $values['contactCounters'] ?? null;
        $this->callMetrics = $values['callMetrics'] ?? null;
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
