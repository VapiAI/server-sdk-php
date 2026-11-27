<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardIntakeCoverageDto extends JsonSerializableType
{
    /**
     * @var value-of<CallHealthDashboardIntakeCoverageDtoDeliveryMode> $deliveryMode
     */
    #[JsonProperty('deliveryMode')]
    public string $deliveryMode;

    /**
     * @var value-of<CallHealthDashboardIntakeCoverageDtoEndToEndCoverage> $endToEndCoverage
     */
    #[JsonProperty('endToEndCoverage')]
    public string $endToEndCoverage;

    /**
     * @param array{
     *   deliveryMode: value-of<CallHealthDashboardIntakeCoverageDtoDeliveryMode>,
     *   endToEndCoverage: value-of<CallHealthDashboardIntakeCoverageDtoEndToEndCoverage>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->deliveryMode = $values['deliveryMode'];
        $this->endToEndCoverage = $values['endToEndCoverage'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
