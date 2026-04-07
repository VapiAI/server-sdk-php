<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CartesiaGenerationConfigExperimental extends JsonSerializableType
{
    /**
     * @var ?int $accentLocalization Toggle accent localization for sonic-3: 0 (disabled, default) or 1 (enabled). When enabled, the voice adapts to match the transcript language accent while preserving vocal characteristics.
     */
    #[JsonProperty('accentLocalization')]
    public ?int $accentLocalization;

    /**
     * @param array{
     *   accentLocalization?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->accentLocalization = $values['accentLocalization'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
