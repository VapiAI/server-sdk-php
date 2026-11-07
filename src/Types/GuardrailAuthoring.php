<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GuardrailAuthoring extends JsonSerializableType
{
    /**
     * @var value-of<GuardrailAuthoringMode> $mode
     */
    #[JsonProperty('mode')]
    public string $mode;

    /**
     * @var string $behavior
     */
    #[JsonProperty('behavior')]
    public string $behavior;

    /**
     * @var ?string $condition Natural-language condition evaluated using the candidate and call history.
     */
    #[JsonProperty('condition')]
    public ?string $condition;

    /**
     * @param array{
     *   mode: value-of<GuardrailAuthoringMode>,
     *   behavior: string,
     *   condition?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->mode = $values['mode'];
        $this->behavior = $values['behavior'];
        $this->condition = $values['condition'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
