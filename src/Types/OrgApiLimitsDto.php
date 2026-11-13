<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class OrgApiLimitsDto extends JsonSerializableType
{
    /**
     * @var float $rateLimitUsage Approximate number of API requests counted against the rate limit in the current minute, in the region that served this request. The count lives in a tumbling one-minute window aligned to the UTC clock (unix seconds / 60), so it resets to zero at the top of every minute; there is no reset header — the next boundary is (floor(now / 60) + 1) * 60.
     */
    #[JsonProperty('rateLimitUsage')]
    public float $rateLimitUsage;

    /**
     * @var float $rateLimitMax Maximum number of standard API requests allowed per minute, in the region that served this request. Live call media traffic is limited separately and is not reflected here.
     */
    #[JsonProperty('rateLimitMax')]
    public float $rateLimitMax;

    /**
     * @param array{
     *   rateLimitUsage: float,
     *   rateLimitMax: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->rateLimitUsage = $values['rateLimitUsage'];
        $this->rateLimitMax = $values['rateLimitMax'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
