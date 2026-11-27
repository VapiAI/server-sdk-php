<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardDiscoveryCoverageDto extends JsonSerializableType
{
    /**
     * @var int $pendingIssueCategoryCount
     */
    #[JsonProperty('pendingIssueCategoryCount')]
    public int $pendingIssueCategoryCount;

    /**
     * @var int $blockedIssueCategoryCount
     */
    #[JsonProperty('blockedIssueCategoryCount')]
    public int $blockedIssueCategoryCount;

    /**
     * @param array{
     *   pendingIssueCategoryCount: int,
     *   blockedIssueCategoryCount: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pendingIssueCategoryCount = $values['pendingIssueCategoryCount'];
        $this->blockedIssueCategoryCount = $values['blockedIssueCategoryCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
