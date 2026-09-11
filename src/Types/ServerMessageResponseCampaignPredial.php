<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ServerMessageResponseCampaignPredial extends JsonSerializableType
{
    /**
     * @var bool $eligible This is whether the contact is eligible to be dialed. `true` places the call; `false` skips the contact. Any other response — a missing or non-boolean `eligible`, an unreachable server, an error, or a timeout — records a pre-dial failure for the contact and the call is not placed.
     */
    #[JsonProperty('eligible')]
    public bool $eligible;

    /**
     * @param array{
     *   eligible: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->eligible = $values['eligible'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
