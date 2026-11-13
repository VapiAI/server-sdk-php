<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardGoalOptionDto extends JsonSerializableType
{
    /**
     * @var string $goalId Explicit selected goal identity, stable across its revisions.
     */
    #[JsonProperty('goalId')]
    public string $goalId;

    /**
     * @var string $succeedsWhen Current visible revision of the selected goal.
     */
    #[JsonProperty('succeedsWhen')]
    public string $succeedsWhen;

    /**
     * @var ?string $leaveOut Current optional semantic exclusions.
     */
    #[JsonProperty('leaveOut')]
    public ?string $leaveOut;

    /**
     * @var string $goalVersion Current revision for display; clients select by stable goalId, never by this version.
     */
    #[JsonProperty('goalVersion')]
    public string $goalVersion;

    /**
     * @param array{
     *   goalId: string,
     *   succeedsWhen: string,
     *   goalVersion: string,
     *   leaveOut?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->goalId = $values['goalId'];
        $this->succeedsWhen = $values['succeedsWhen'];
        $this->leaveOut = $values['leaveOut'] ?? null;
        $this->goalVersion = $values['goalVersion'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
