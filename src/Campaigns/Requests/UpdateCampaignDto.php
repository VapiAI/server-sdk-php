<?php

namespace Vapi\Campaigns\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Types\DialPlanEntry;
use Vapi\Core\Types\ArrayType;
use Vapi\Types\SchedulePlan;
use Vapi\Campaigns\Types\UpdateCampaignDtoStatus;

class UpdateCampaignDto extends JsonSerializableType
{
    /**
     * @var ?string $name This is the name of the campaign. This is just for your own reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * This is the assistant ID that will be used for the campaign calls.
     * Can only be updated if campaign is not in progress or has ended.
     *
     * @var ?string $assistantId
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * This is the workflow ID that will be used for the campaign calls.
     * Can only be updated if campaign is not in progress or has ended.
     *
     * @var ?string $workflowId
     */
    #[JsonProperty('workflowId')]
    public ?string $workflowId;

    /**
     * This is the squad ID that will be used for the campaign calls.
     * Can only be updated if campaign is not in progress or has ended.
     *
     * @var ?string $squadId
     */
    #[JsonProperty('squadId')]
    public ?string $squadId;

    /**
     * This is the phone number ID that will be used for the campaign calls.
     * Can only be updated if campaign is not in progress or has ended.
     * Note: `phoneNumberId` and `dialPlan` are mutually exclusive.
     *
     * @var ?string $phoneNumberId
     */
    #[JsonProperty('phoneNumberId')]
    public ?string $phoneNumberId;

    /**
     * @var ?array<DialPlanEntry> $dialPlan This is a list of dial entries, each specifying a phone number and the customers to call using that number. Can only be updated if campaign is not in progress or has ended. Note: phoneNumberId and dialPlan are mutually exclusive.
     */
    #[JsonProperty('dialPlan'), ArrayType([DialPlanEntry::class])]
    public ?array $dialPlan;

    /**
     * This is the schedule plan for the campaign.
     * Can only be updated if campaign is not in progress or has ended.
     *
     * @var ?SchedulePlan $schedulePlan
     */
    #[JsonProperty('schedulePlan')]
    public ?SchedulePlan $schedulePlan;

    /**
     * This is the status of the campaign.
     * Can only be updated to 'ended' if you want to end the campaign.
     * When set to 'ended', it will delete all scheduled calls. Calls in progress will be allowed to complete.
     *
     * @var ?value-of<UpdateCampaignDtoStatus> $status
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @param array{
     *   name?: ?string,
     *   assistantId?: ?string,
     *   workflowId?: ?string,
     *   squadId?: ?string,
     *   phoneNumberId?: ?string,
     *   dialPlan?: ?array<DialPlanEntry>,
     *   schedulePlan?: ?SchedulePlan,
     *   status?: ?value-of<UpdateCampaignDtoStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->assistantId = $values['assistantId'] ?? null;
        $this->workflowId = $values['workflowId'] ?? null;
        $this->squadId = $values['squadId'] ?? null;
        $this->phoneNumberId = $values['phoneNumberId'] ?? null;
        $this->dialPlan = $values['dialPlan'] ?? null;
        $this->schedulePlan = $values['schedulePlan'] ?? null;
        $this->status = $values['status'] ?? null;
    }
}
