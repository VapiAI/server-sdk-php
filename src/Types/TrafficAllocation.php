<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

class TrafficAllocation extends JsonSerializableType
{
    /**
     * @var string $id Unique identifier. The most recently created allocation for an assistant is the one in effect.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var ?string $assistantId The assistant this allocation splits calls for.
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @var value-of<TrafficAllocationAllocationIntent> $allocationIntent 'explicit' splits calls across this allocation's targets. 'follow-latest' sends every call to the newest published version.
     */
    #[JsonProperty('allocationIntent')]
    public string $allocationIntent;

    /**
     * @var DateTime $createdAt When this allocation was created, which is also when it took effect.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var value-of<TrafficAllocationActorType> $actorType Who created this allocation. 'system' means Vapi created it automatically, for example when a publish advances a follow-latest allocation.
     */
    #[JsonProperty('actorType')]
    public string $actorType;

    /**
     * @var ?string $actorId The user id or API key id that created this allocation. Absent for system rows.
     */
    #[JsonProperty('actorId')]
    public ?string $actorId;

    /**
     * @var ?string $actorEmail Email of the user who created this allocation, as of that time.
     */
    #[JsonProperty('actorEmail')]
    public ?string $actorEmail;

    /**
     * @var ?string $description The note given when this allocation was created, if any.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var array<TrafficAllocationTarget> $targets The versions this allocation splits calls across, in position order. Empty for follow-latest allocations.
     */
    #[JsonProperty('targets'), ArrayType([TrafficAllocationTarget::class])]
    public array $targets;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   allocationIntent: value-of<TrafficAllocationAllocationIntent>,
     *   createdAt: DateTime,
     *   actorType: value-of<TrafficAllocationActorType>,
     *   targets: array<TrafficAllocationTarget>,
     *   assistantId?: ?string,
     *   actorId?: ?string,
     *   actorEmail?: ?string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->assistantId = $values['assistantId'] ?? null;
        $this->allocationIntent = $values['allocationIntent'];
        $this->createdAt = $values['createdAt'];
        $this->actorType = $values['actorType'];
        $this->actorId = $values['actorId'] ?? null;
        $this->actorEmail = $values['actorEmail'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->targets = $values['targets'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
