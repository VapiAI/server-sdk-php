<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardAssistantOverviewDto extends JsonSerializableType
{
    /**
     * @var CallHealthDashboardAssistantReferenceDto $assistant Current permitted assistant metadata, fetched in a batch.
     */
    #[JsonProperty('assistant')]
    public CallHealthDashboardAssistantReferenceDto $assistant;

    /**
     * @var CallHealthDashboardGoalDefinitionDto $goalDefinition Every row represents an explicitly selected, tenant-owned assistant goal.
     */
    #[JsonProperty('goalDefinition')]
    public CallHealthDashboardGoalDefinitionDto $goalDefinition;

    /**
     * @var CallHealthDashboardGoalSummaryDto $goal Window totals for the selected goal, including zero-result assistants.
     */
    #[JsonProperty('goal')]
    public CallHealthDashboardGoalSummaryDto $goal;

    /**
     * @param array{
     *   assistant: CallHealthDashboardAssistantReferenceDto,
     *   goalDefinition: CallHealthDashboardGoalDefinitionDto,
     *   goal: CallHealthDashboardGoalSummaryDto,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistant = $values['assistant'];
        $this->goalDefinition = $values['goalDefinition'];
        $this->goal = $values['goal'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
