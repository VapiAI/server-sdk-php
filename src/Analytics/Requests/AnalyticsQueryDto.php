<?php

namespace Vapi\Analytics\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Types\AnalyticsQuery;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class AnalyticsQueryDto extends JsonSerializableType
{
    /**
     * @var array<AnalyticsQuery> $queries This is the list of metric queries you want to perform.
     */
    #[JsonProperty('queries'), ArrayType([AnalyticsQuery::class])]
    public array $queries;

    /**
     * @param array{
     *   queries: array<AnalyticsQuery>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->queries = $values['queries'];
    }
}
