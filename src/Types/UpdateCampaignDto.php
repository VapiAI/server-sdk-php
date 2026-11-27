<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Fields used to update an outbound calling campaign, including its name, status, calling resource, phone-number or dial-plan settings, and schedule.
 */
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
     * Set to 'cancelled' to stop the campaign ('ended' is a V1 alias). Scheduled
     * calls are deleted; in-progress calls are allowed to finish.
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
