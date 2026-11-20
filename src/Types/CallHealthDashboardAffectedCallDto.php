<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class CallHealthDashboardAffectedCallDto extends JsonSerializableType
{
    /**
     * @var string $callId
     */
    #[JsonProperty('callId')]
    public string $callId;

    /**
     * @var string $assistantId
     */
    #[JsonProperty('assistantId')]
    public string $assistantId;

    /**
     * @var DateTime $callTime Call completion time (endedAt), never startedAt.
     */
    #[JsonProperty('callTime'), Date(Date::TYPE_DATETIME)]
    public DateTime $callTime;

    /**
     * @var value-of<CallHealthDashboardAffectedCallDtoCallAvailability> $callAvailability
     */
    #[JsonProperty('callAvailability')]
    public string $callAvailability;

    /**
     * @var ?string $assistantVersionId The assistant version the call ran on; absent when it ran on none.
     */
    #[JsonProperty('assistantVersionId')]
    public ?string $assistantVersionId;

    /**
     * @var ?string $assistantVersion That version's label, such as v3; absent when the call ran on none or the label was unavailable at registration.
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

    /**
     * @param array{
     *   callId: string,
     *   assistantId: string,
     *   callTime: DateTime,
     *   callAvailability: value-of<CallHealthDashboardAffectedCallDtoCallAvailability>,
     *   assistantVersionId?: ?string,
     *   assistantVersion?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->callId = $values['callId'];
        $this->assistantId = $values['assistantId'];
        $this->callTime = $values['callTime'];
        $this->callAvailability = $values['callAvailability'];
        $this->assistantVersionId = $values['assistantVersionId'] ?? null;
        $this->assistantVersion = $values['assistantVersion'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
