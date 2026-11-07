<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use DateTime;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Date;

class CallHealthDashboardCoverageDto extends JsonSerializableType
{
    /**
     * @var DateTime $asOf
     */
    #[JsonProperty('asOf'), Date(Date::TYPE_DATETIME)]
    public DateTime $asOf;

    /**
     * @var CallHealthDashboardIntakeCoverageDto $intake
     */
    #[JsonProperty('intake')]
    public CallHealthDashboardIntakeCoverageDto $intake;

    /**
     * @var CallHealthDashboardGoalGapsDto $goal
     */
    #[JsonProperty('goal')]
    public CallHealthDashboardGoalGapsDto $goal;

    /**
     * @var CallHealthDashboardClassificationCoverageDto $classification
     */
    #[JsonProperty('classification')]
    public CallHealthDashboardClassificationCoverageDto $classification;

    /**
     * @var CallHealthDashboardAssignmentCoverageDto $assignment
     */
    #[JsonProperty('assignment')]
    public CallHealthDashboardAssignmentCoverageDto $assignment;

    /**
     * @var CallHealthDashboardDiscoveryCoverageDto $discovery
     */
    #[JsonProperty('discovery')]
    public CallHealthDashboardDiscoveryCoverageDto $discovery;

    /**
     * @var CallHealthDashboardSweepCoverageDto $sweep
     */
    #[JsonProperty('sweep')]
    public CallHealthDashboardSweepCoverageDto $sweep;

    /**
     * @var bool $countsComplete Completeness of received authorized work only; never source delivery coverage.
     */
    #[JsonProperty('countsComplete')]
    public bool $countsComplete;

    /**
     * @param array{
     *   asOf: DateTime,
     *   intake: CallHealthDashboardIntakeCoverageDto,
     *   goal: CallHealthDashboardGoalGapsDto,
     *   classification: CallHealthDashboardClassificationCoverageDto,
     *   assignment: CallHealthDashboardAssignmentCoverageDto,
     *   discovery: CallHealthDashboardDiscoveryCoverageDto,
     *   sweep: CallHealthDashboardSweepCoverageDto,
     *   countsComplete: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->asOf = $values['asOf'];
        $this->intake = $values['intake'];
        $this->goal = $values['goal'];
        $this->classification = $values['classification'];
        $this->assignment = $values['assignment'];
        $this->discovery = $values['discovery'];
        $this->sweep = $values['sweep'];
        $this->countsComplete = $values['countsComplete'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
