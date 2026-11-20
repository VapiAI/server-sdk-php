<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHealthDashboardFacetsDto extends JsonSerializableType
{
    /**
     * @var array<value-of<CallHealthDashboardFacetsDtoStatusesItem>> $statuses
     */
    #[JsonProperty('statuses'), ArrayType(['string'])]
    public array $statuses;

    /**
     * @param array{
     *   statuses: array<value-of<CallHealthDashboardFacetsDtoStatusesItem>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->statuses = $values['statuses'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
