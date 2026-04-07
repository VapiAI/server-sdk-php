<?php

namespace Vapi\Campaigns\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Types\DialPlanEntry;
use Vapi\Core\Types\ArrayType;
use Vapi\Types\SchedulePlan;
use Vapi\Types\CreateCustomerDto;

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
     * @var ?array<CreateCustomerDto> $customers These are the customers that will be called in the campaign. Required if dialPlan is not provided.
     */
    #[JsonProperty('customers'), ArrayType([CreateCustomerDto::class])]
    public ?array $customers;

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
    }
}
