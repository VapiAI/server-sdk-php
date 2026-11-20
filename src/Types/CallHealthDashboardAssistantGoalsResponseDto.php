<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardAssistantGoalsResponseDto extends JsonSerializableType
{
    /**
     * @var array<CallHealthDashboardAssistantGoalsDto> $results Complete requested visible assistant cohort, including assistants with no goal options.
     */
    #[JsonProperty('results'), ArrayType([CallHealthDashboardAssistantGoalsDto::class])]
    public array $results;

    /**
     * @param array{
     *   results: array<CallHealthDashboardAssistantGoalsDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->results = $values['results'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
