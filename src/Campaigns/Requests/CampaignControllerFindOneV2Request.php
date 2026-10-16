<?php

namespace Vapi\Campaigns\Requests;

use Vapi\Core\Json\JsonSerializableType;

class CampaignControllerFindOneV2Request extends JsonSerializableType
{
    /**
     * When true, the response includes `contactCounters` and `callMetrics`.
     * These are aggregate queries over the campaign's contacts and events, so
     * they are opt-in rather than paid for on every read. Defaults to false.
     *
     * @var ?bool $includeCounters
     */
    public ?bool $includeCounters;

    /**
     * @param array{
     *   includeCounters?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->includeCounters = $values['includeCounters'] ?? null;
    }
}
