<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationOnboardingSuiteRefDto extends JsonSerializableType
{
    /**
     * @var string $id Suite id; pass it to edit or run the suite.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name Suite name.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
