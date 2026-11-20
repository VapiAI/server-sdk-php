<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CampaignCallMetrics extends JsonSerializableType
{
    /**
     * This is the number of contacts a call was actually placed for. Contacts
     * that were skipped, rejected before dialing, or failed to dispatch are not
     * counted — no call existed, so there was nothing to answer.
     *
     * @var float $dialed
     */
    #[JsonProperty('dialed')]
    public float $dialed;

    /**
     * This is the number of those calls a human picked up. Voicemail does not
     * count. Divide by `dialed` for the pick-up rate.
     *
     * @var float $connected
     */
    #[JsonProperty('connected')]
    public float $connected;

    /**
     * @param array{
     *   dialed: float,
     *   connected: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dialed = $values['dialed'];
        $this->connected = $values['connected'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
