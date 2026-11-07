<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class CampaignContact extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $campaignId
     */
    #[JsonProperty('campaignId')]
    public string $campaignId;

    /**
     * @var string $orgId
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var ?string $customerId
     */
    #[JsonProperty('customerId')]
    public ?string $customerId;

    /**
     * @var string $number
     */
    #[JsonProperty('number')]
    public string $number;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?AssistantOverrides $assistantOverrides
     */
    #[JsonProperty('assistantOverrides')]
    public ?AssistantOverrides $assistantOverrides;

    /**
     * @var ?AssistantOverrides $squadOverrides Use this when the campaign targets a `squadId`. Mirrors the call-level `squadOverrides` field. Merged with the campaign-level squadOverrides at dispatch time.
     */
    #[JsonProperty('squadOverrides')]
    public ?AssistantOverrides $squadOverrides;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @param array{
     *   id: string,
     *   campaignId: string,
     *   orgId: string,
     *   number: string,
     *   createdAt: DateTime,
     *   customerId?: ?string,
     *   name?: ?string,
     *   assistantOverrides?: ?AssistantOverrides,
     *   squadOverrides?: ?AssistantOverrides,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->campaignId = $values['campaignId'];
        $this->orgId = $values['orgId'];
        $this->customerId = $values['customerId'] ?? null;
        $this->number = $values['number'];
        $this->name = $values['name'] ?? null;
        $this->assistantOverrides = $values['assistantOverrides'] ?? null;
        $this->squadOverrides = $values['squadOverrides'] ?? null;
        $this->createdAt = $values['createdAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
