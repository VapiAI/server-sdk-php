<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationRunListSource extends JsonSerializableType
{
    /**
     * @var value-of<SimulationRunListSourceType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?string $id
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var bool $linkable
     */
    #[JsonProperty('linkable')]
    public bool $linkable;

    /**
     * @var array<string> $simulationIds
     */
    #[JsonProperty('simulationIds'), ArrayType(['string'])]
    public array $simulationIds;

    /**
     * @param array{
     *   type: value-of<SimulationRunListSourceType>,
     *   name: string,
     *   linkable: bool,
     *   simulationIds: array<string>,
     *   id?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'];
        $this->linkable = $values['linkable'];
        $this->simulationIds = $values['simulationIds'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
