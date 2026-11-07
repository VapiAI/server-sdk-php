<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class CallHealthDashboardIssueCoverageDto extends JsonSerializableType
{
    /**
     * @var value-of<CallHealthDashboardIssueCoverageDtoState> $state
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @var DateTime $asOf
     */
    #[JsonProperty('asOf'), Date(Date::TYPE_DATETIME)]
    public DateTime $asOf;

    /**
     * @param array{
     *   state: value-of<CallHealthDashboardIssueCoverageDtoState>,
     *   asOf: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->state = $values['state'];
        $this->asOf = $values['asOf'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
