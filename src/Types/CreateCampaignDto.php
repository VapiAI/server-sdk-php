<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Configuration used to create an outbound calling campaign. Choose an assistant, squad, or workflow, then provide customers, phone-number or dial-plan settings, and an optional schedule.
 */
class CreateCampaignDto extends JsonSerializableType
{
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
     * @var ?string $workflowId This is the workflow ID that will be used for the campaign calls. Note: Only one of assistantId, workflowId, or squadId can be used.
     */
    #[JsonProperty('workflowId')]
    public ?string $workflowId;

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
     * @var ?array<DialPlanEntry> $dialPlan This is a list of dial entries, each specifying a phone number and the customers to call using that number. Use this when you want different phone numbers to call different sets of customers. Note: phoneNumberId and dialPlan are mutually exclusive.
     */
    #[JsonProperty('dialPlan'), ArrayType([DialPlanEntry::class])]
    public ?array $dialPlan;

    /**
     * @var ?SchedulePlan $schedulePlan This is the schedule plan for the campaign. Calls will start at startedAt and continue until your organization’s concurrency limit is reached. Any remaining calls will be retried for up to one hour as capacity becomes available. After that hour or after latestAt, whichever comes first, any calls that couldn’t be placed won’t be retried.
     */
    #[JsonProperty('schedulePlan')]
    public ?SchedulePlan $schedulePlan;

    /**
     * @var ?array<CreateCustomerDto> $customers These are the customers that will be called in the campaign. Required if dialPlan is not provided. Maximum of 10000 customers per campaign.
     */
    #[JsonProperty('customers'), ArrayType([CreateCustomerDto::class])]
    public ?array $customers;

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
     * @var ?array<value-of<CreateCampaignDtoServerMessagesItem>> $serverMessages These are the messages that will be sent to your Server URL.
     */
    #[JsonProperty('serverMessages'), ArrayType(['string'])]
    public ?array $serverMessages;

    /**
     * @var ?CampaignPredialPlan $predialPlan This opts the campaign into the blocking `campaign.predial` eligibility webhook. When set, every contact triggers a `campaign.predial` POST to the Server URL before dialing, and the response `{ eligible: boolean }` decides whether the call is placed. Requires `server`. When unset, no pre-dial webhook is sent.
     */
    #[JsonProperty('predialPlan')]
    public ?CampaignPredialPlan $predialPlan;

    /**
     * @var ?string $duplicateFromCampaignId Optional campaign ID to duplicate config from. Provided fields in the request override the source. If `customers` is omitted, contacts are copied from the source.
     */
    #[JsonProperty('duplicateFromCampaignId')]
    public ?string $duplicateFromCampaignId;

    /**
     * @param array{
     *   name: string,
     *   assistantId?: ?string,
     *   workflowId?: ?string,
     *   squadId?: ?string,
     *   phoneNumberId?: ?string,
     *   dialPlan?: ?array<DialPlanEntry>,
     *   schedulePlan?: ?SchedulePlan,
     *   customers?: ?array<CreateCustomerDto>,
     *   maxConcurrency?: ?float,
     *   assistantOverrides?: ?AssistantOverrides,
     *   squadOverrides?: ?AssistantOverrides,
     *   server?: ?Server,
     *   serverMessages?: ?array<value-of<CreateCampaignDtoServerMessagesItem>>,
     *   predialPlan?: ?CampaignPredialPlan,
     *   duplicateFromCampaignId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->assistantId = $values['assistantId'] ?? null;
        $this->workflowId = $values['workflowId'] ?? null;
        $this->squadId = $values['squadId'] ?? null;
        $this->phoneNumberId = $values['phoneNumberId'] ?? null;
        $this->dialPlan = $values['dialPlan'] ?? null;
        $this->schedulePlan = $values['schedulePlan'] ?? null;
        $this->customers = $values['customers'] ?? null;
        $this->maxConcurrency = $values['maxConcurrency'] ?? null;
        $this->assistantOverrides = $values['assistantOverrides'] ?? null;
        $this->squadOverrides = $values['squadOverrides'] ?? null;
        $this->server = $values['server'] ?? null;
        $this->serverMessages = $values['serverMessages'] ?? null;
        $this->predialPlan = $values['predialPlan'] ?? null;
        $this->duplicateFromCampaignId = $values['duplicateFromCampaignId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
