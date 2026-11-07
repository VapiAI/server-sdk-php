<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationOnboardingRequirementDto extends JsonSerializableType
{
    /**
     * @var string $id Stable requirement id, e.g. `R3`.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $text One observable behaviour the assistant must get right.
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var ?value-of<SimulationOnboardingRequirementDtoTag> $tag Indicates an assumption, a requirement that needs a voice simulation, or a requirement that cannot be tested.
     */
    #[JsonProperty('tag')]
    public ?string $tag;

    /**
     * @var ?string $note What was assumed, why only a voice run can check it, or why it cannot be tested.
     */
    #[JsonProperty('note')]
    public ?string $note;

    /**
     * @param array{
     *   id: string,
     *   text: string,
     *   tag?: ?value-of<SimulationOnboardingRequirementDtoTag>,
     *   note?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->text = $values['text'];
        $this->tag = $values['tag'] ?? null;
        $this->note = $values['note'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
