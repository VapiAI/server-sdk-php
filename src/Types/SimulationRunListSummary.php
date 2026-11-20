<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunListSummary extends JsonSerializableType
{
    /**
     * @var SimulationRunListSource $source
     */
    #[JsonProperty('source')]
    public SimulationRunListSource $source;

    /**
     * @var ?string $targetSnapshotName
     */
    #[JsonProperty('targetSnapshotName')]
    public ?string $targetSnapshotName;

    /**
     * @var float $simulationCount
     */
    #[JsonProperty('simulationCount')]
    public float $simulationCount;

    /**
     * @param array{
     *   source: SimulationRunListSource,
     *   simulationCount: float,
     *   targetSnapshotName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->source = $values['source'];
        $this->targetSnapshotName = $values['targetSnapshotName'] ?? null;
        $this->simulationCount = $values['simulationCount'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
