<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardGoalSummaryDto extends JsonSerializableType
{
    /**
     * @var int $registeredCallCount
     */
    #[JsonProperty('registeredCallCount')]
    public int $registeredCallCount;

    /**
     * @var int $eligibleCallCount Calls with an accepted semantic eligibility decision and binary goal outcome.
     */
    #[JsonProperty('eligibleCallCount')]
    public int $eligibleCallCount;

    /**
     * @var int $ineligibleCallCount Accepted semantic exclusions; absent from the goal denominator.
     */
    #[JsonProperty('ineligibleCallCount')]
    public int $ineligibleCallCount;

    /**
     * @var int $unassessedCallCount No accepted eligibility decision, including technical or privacy exclusions.
     */
    #[JsonProperty('unassessedCallCount')]
    public int $unassessedCallCount;

    /**
     * @var int $goalMetCount
     */
    #[JsonProperty('goalMetCount')]
    public int $goalMetCount;

    /**
     * @var int $goalNotMetCount
     */
    #[JsonProperty('goalNotMetCount')]
    public int $goalNotMetCount;

    /**
     * @var int $evaluatedCallCount
     */
    #[JsonProperty('evaluatedCallCount')]
    public int $evaluatedCallCount;

    /**
     * @var int $analyzedCallCount Accepted current-goal results, including ineligible; independent of issue processing.
     */
    #[JsonProperty('analyzedCallCount')]
    public int $analyzedCallCount;

    /**
     * @var ?float $goalMetRate Goal-met / evaluatedCallCount; omitted when there are no binary outcomes.
     */
    #[JsonProperty('goalMetRate')]
    public ?float $goalMetRate;

    /**
     * @var ?float $goalNotMetRate
     */
    #[JsonProperty('goalNotMetRate')]
    public ?float $goalNotMetRate;

    /**
     * @param array{
     *   registeredCallCount: int,
     *   eligibleCallCount: int,
     *   ineligibleCallCount: int,
     *   unassessedCallCount: int,
     *   goalMetCount: int,
     *   goalNotMetCount: int,
     *   evaluatedCallCount: int,
     *   analyzedCallCount: int,
     *   goalMetRate?: ?float,
     *   goalNotMetRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->registeredCallCount = $values['registeredCallCount'];
        $this->eligibleCallCount = $values['eligibleCallCount'];
        $this->ineligibleCallCount = $values['ineligibleCallCount'];
        $this->unassessedCallCount = $values['unassessedCallCount'];
        $this->goalMetCount = $values['goalMetCount'];
        $this->goalNotMetCount = $values['goalNotMetCount'];
        $this->evaluatedCallCount = $values['evaluatedCallCount'];
        $this->analyzedCallCount = $values['analyzedCallCount'];
        $this->goalMetRate = $values['goalMetRate'] ?? null;
        $this->goalNotMetRate = $values['goalNotMetRate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
