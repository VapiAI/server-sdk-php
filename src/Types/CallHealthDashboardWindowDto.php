<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use DateTime;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Date;

class CallHealthDashboardWindowDto extends JsonSerializableType
{
    /**
     * @var DateTime $callTimeGte
     */
    #[JsonProperty('callTimeGte'), Date(Date::TYPE_DATETIME)]
    public DateTime $callTimeGte;

    /**
     * @var DateTime $callTimeLt
     */
    #[JsonProperty('callTimeLt'), Date(Date::TYPE_DATETIME)]
    public DateTime $callTimeLt;

    /**
     * @param array{
     *   callTimeGte: DateTime,
     *   callTimeLt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->callTimeGte = $values['callTimeGte'];
        $this->callTimeLt = $values['callTimeLt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
