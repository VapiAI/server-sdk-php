<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantGoalSetDto extends JsonSerializableType
{
    /**
     * @var string $expectedGoalVersion Observed current revision of this goal as a positive decimal bigint string.
     */
    #[JsonProperty('expectedGoalVersion')]
    public string $expectedGoalVersion;

    /**
     * @var string $succeedsWhen Success criteria. Trimmed before commit; blank or non-PostgreSQL-compatible text is rejected.
     */
    #[JsonProperty('succeedsWhen')]
    public string $succeedsWhen;

    /**
     * @var ?string $leaveOut Optional trimmed exclusions. Omit or send null for no exclusions.
     */
    #[JsonProperty('leaveOut')]
    public ?string $leaveOut;

    /**
     * @param array{
     *   expectedGoalVersion: string,
     *   succeedsWhen: string,
     *   leaveOut?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->expectedGoalVersion = $values['expectedGoalVersion'];
        $this->succeedsWhen = $values['succeedsWhen'];
        $this->leaveOut = $values['leaveOut'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
