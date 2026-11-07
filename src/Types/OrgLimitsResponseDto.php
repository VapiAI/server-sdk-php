<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class OrgLimitsResponseDto extends JsonSerializableType
{
    /**
     * @var ?OrgConcurrencyLimitsDto $subscriptionLimits Call concurrency limits for the subscription. Unlike the call create response, remainingConcurrentCalls does not reserve a slot for a new call: it is the plain headroom at the time of the read. Covers the concurrency gate only — credits, frozen subscriptions, included minutes, and the billing limit are not reflected here, so call create can still refuse. Omitted when the limits could not be computed, and for an org with no subscription at all (legacy ungated orgs), which has no concurrency ceiling.
     */
    #[JsonProperty('subscriptionLimits')]
    public ?OrgConcurrencyLimitsDto $subscriptionLimits;

    /**
     * @var ?OrgApiLimitsDto $apiLimits API rate limit usage for the org. Approximate, per region, and scoped to the current minute. Omitted when the limit information is unavailable.
     */
    #[JsonProperty('apiLimits')]
    public ?OrgApiLimitsDto $apiLimits;

    /**
     * @param array{
     *   subscriptionLimits?: ?OrgConcurrencyLimitsDto,
     *   apiLimits?: ?OrgApiLimitsDto,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->subscriptionLimits = $values['subscriptionLimits'] ?? null;
        $this->apiLimits = $values['apiLimits'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
