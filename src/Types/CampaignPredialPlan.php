<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CampaignPredialPlan extends JsonSerializableType
{
    /**
     * @var ?bool $enabled Whether the pre-dial eligibility webhook is active. Defaults to true when `predialPlan` is set. Set to false to keep the plan without running the webhook (useful when duplicating a campaign).
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @param array{
     *   enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
