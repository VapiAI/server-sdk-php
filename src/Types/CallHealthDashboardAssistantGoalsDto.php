<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardAssistantGoalsDto extends JsonSerializableType
{
    /**
     * @var string $assistantId Requested assistant identity whose current published row remains visible.
     */
    #[JsonProperty('assistantId')]
    public string $assistantId;

    /**
     * @var array<CallHealthDashboardGoalOptionDto> $goals Empty when this visible assistant has no goals; no goal is automatically selected.
     */
    #[JsonProperty('goals'), ArrayType([CallHealthDashboardGoalOptionDto::class])]
    public array $goals;

    /**
     * @param array{
     *   assistantId: string,
     *   goals: array<CallHealthDashboardGoalOptionDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantId = $values['assistantId'];
        $this->goals = $values['goals'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
