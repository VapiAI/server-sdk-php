<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardSweepCoverageDto extends JsonSerializableType
{
    /**
     * @var value-of<CallHealthDashboardSweepCoverageDtoState> $state
     */
    #[JsonProperty('state')]
    public string $state;

    /**
     * @param array{
     *   state: value-of<CallHealthDashboardSweepCoverageDtoState>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->state = $values['state'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
