<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficTabStructuredOutputNumericDto extends JsonSerializableType
{
    /**
     * @var ?float $mean
     */
    #[JsonProperty('mean')]
    public ?float $mean;

    /**
     * @var ?float $stddev
     */
    #[JsonProperty('stddev')]
    public ?float $stddev;

    /**
     * @var ?float $p50
     */
    #[JsonProperty('p50')]
    public ?float $p50;

    /**
     * @var ?float $p95
     */
    #[JsonProperty('p95')]
    public ?float $p95;

    /**
     * @var ?float $sum
     */
    #[JsonProperty('sum')]
    public ?float $sum;

    /**
     * @param array{
     *   mean?: ?float,
     *   stddev?: ?float,
     *   p50?: ?float,
     *   p95?: ?float,
     *   sum?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mean = $values['mean'] ?? null;
        $this->stddev = $values['stddev'] ?? null;
        $this->p50 = $values['p50'] ?? null;
        $this->p95 = $values['p95'] ?? null;
        $this->sum = $values['sum'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
