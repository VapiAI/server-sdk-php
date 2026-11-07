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
     * @param array{
     *   callId: string,
     *   assistantId: string,
     *   callTime: DateTime,
     *   callAvailability: value-of<CallHealthDashboardAffectedCallDtoCallAvailability>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->callId = $values['callId'];
        $this->assistantId = $values['assistantId'];
        $this->callTime = $values['callTime'];
        $this->callAvailability = $values['callAvailability'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
