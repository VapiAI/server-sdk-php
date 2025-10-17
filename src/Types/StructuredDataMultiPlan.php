<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class StructuredDataMultiPlan extends JsonSerializableType
{
    /**
     * @var string $key This is the key of the structured data plan in the catalog.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var StructuredDataPlan $plan This is an individual structured data plan in the catalog.
     */
    #[JsonProperty('plan')]
    public StructuredDataPlan $plan;

    /**
     * @param array{
     *   key: string,
     *   plan: StructuredDataPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->plan = $values['plan'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
