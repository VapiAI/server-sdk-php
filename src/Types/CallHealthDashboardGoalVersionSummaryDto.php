<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardGoalVersionSummaryDto extends JsonSerializableType
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
     * @var ?string $assistantVersionId The version the calls ran on; null groups the calls that ran on no version.
     */
    #[JsonProperty('assistantVersionId')]
    public ?string $assistantVersionId;

    /**
     * @var ?string $assistantVersion The version's label, such as v3; absent for calls on no version or whose label was unavailable at registration.
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

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
     *   assistantVersionId?: ?string,
     *   assistantVersion?: ?string,
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
