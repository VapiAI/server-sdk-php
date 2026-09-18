<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Display settings for a line insight, including chart name, axis labels, and optional y-axis bounds.
 */
class LineInsightMetadata extends JsonSerializableType
{
    /**
     * @var ?string $xAxisLabel Label displayed on the chart's x-axis.
     */
    #[JsonProperty('xAxisLabel')]
    public ?string $xAxisLabel;

    /**
     * @var ?string $yAxisLabel Label displayed on the chart's y-axis.
     */
    #[JsonProperty('yAxisLabel')]
    public ?string $yAxisLabel;

    /**
     * @var ?float $yAxisMin Minimum value displayed on the chart's y-axis.
     */
    #[JsonProperty('yAxisMin')]
    public ?float $yAxisMin;

    /**
     * @var ?float $yAxisMax Maximum value displayed on the chart's y-axis.
     */
    #[JsonProperty('yAxisMax')]
    public ?float $yAxisMax;

    /**
     * @var ?string $name Display name for the insight chart.
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
