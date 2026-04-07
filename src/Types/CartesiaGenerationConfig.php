<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CartesiaGenerationConfig extends JsonSerializableType
{
    /**
     * @var ?float $speed Fine-grained speed control for sonic-3. Only available for sonic-3 model.
     */
    #[JsonProperty('speed')]
    public ?float $speed;

    /**
     * @var ?float $volume Fine-grained volume control for sonic-3. Only available for sonic-3 model.
     */
    #[JsonProperty('volume')]
    public ?float $volume;

    /**
     * @var ?CartesiaGenerationConfigExperimental $experimental Experimental model controls for sonic-3. These are subject to breaking changes.
     */
    #[JsonProperty('experimental')]
    public ?CartesiaGenerationConfigExperimental $experimental;

    /**
     * @param array{
     *   speed?: ?float,
     *   volume?: ?float,
     *   experimental?: ?CartesiaGenerationConfigExperimental,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->speed = $values['speed'] ?? null;
        $this->volume = $values['volume'] ?? null;
        $this->experimental = $values['experimental'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
