<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationOnboardingSuiteCoverageDto extends JsonSerializableType
{
    /**
     * @var float $covered Requirements at least one simulation covers.
     */
    #[JsonProperty('covered')]
    public float $covered;

    /**
     * @var float $total Requirements in the agreed draft.
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @var array<SimulationOnboardingCoverageGapDto> $gaps Requirements no simulation covers, and why.
     */
    #[JsonProperty('gaps'), ArrayType([SimulationOnboardingCoverageGapDto::class])]
    public array $gaps;

    /**
     * @var float $retryable Planned scenarios an edit with `retryFailed` would regenerate.
     */
    #[JsonProperty('retryable')]
    public float $retryable;

    /**
     * @param array{
     *   covered: float,
     *   total: float,
     *   gaps: array<SimulationOnboardingCoverageGapDto>,
     *   retryable: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->covered = $values['covered'];
        $this->total = $values['total'];
        $this->gaps = $values['gaps'];
        $this->retryable = $values['retryable'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
