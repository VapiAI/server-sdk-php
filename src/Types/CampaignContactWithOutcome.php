<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class CampaignContactWithOutcome extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

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
     * @var value-of<CampaignContactWithOutcomeStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var ?string $callId
     */
    #[JsonProperty('callId')]
    public ?string $callId;

    /**
     * @var ?DateTime $dispatchedAt
     */
    #[JsonProperty('dispatchedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $dispatchedAt;

    /**
     * @var ?string $endedReason
     */
    #[JsonProperty('endedReason')]
    public ?string $endedReason;

    /**
     * @param array{
     *   id: string,
     *   number: string,
     *   status: value-of<CampaignContactWithOutcomeStatus>,
     *   name?: ?string,
     *   callId?: ?string,
     *   dispatchedAt?: ?DateTime,
     *   endedReason?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->number = $values['number'];
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'];
        $this->callId = $values['callId'] ?? null;
        $this->dispatchedAt = $values['dispatchedAt'] ?? null;
        $this->endedReason = $values['endedReason'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
