<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class BarInsightMetadata extends JsonSerializableType
{
    /**
     * @var ?string $xAxisLabel
     */
    #[JsonProperty('xAxisLabel')]
    public ?string $xAxisLabel;

    /**
     * @var ?string $yAxisLabel
     */
    #[JsonProperty('yAxisLabel')]
    public ?string $yAxisLabel;

    /**
     * @var ?float $yAxisMin
     */
    #[JsonProperty('yAxisMin')]
    public ?float $yAxisMin;

    /**
     * @var ?float $yAxisMax
     */
    #[JsonProperty('yAxisMax')]
    public ?float $yAxisMax;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   xAxisLabel?: ?string,
     *   yAxisLabel?: ?string,
     *   yAxisMin?: ?float,
     *   yAxisMax?: ?float,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->xAxisLabel = $values['xAxisLabel'] ?? null;
        $this->yAxisLabel = $values['yAxisLabel'] ?? null;
        $this->yAxisMin = $values['yAxisMin'] ?? null;
        $this->yAxisMax = $values['yAxisMax'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
