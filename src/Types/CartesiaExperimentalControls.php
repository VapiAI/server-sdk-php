<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

/**
 * Cartesia voice controls for speed and emotion.
 */
class CartesiaExperimentalControls extends JsonSerializableType
{
    /**
     * @var (
     *    value-of<CartesiaSpeedControlZero>
     *   |float
     * )|null $speed Speaking-speed control expressed as a preset or a value from -1 to 1.
     */
    #[JsonProperty('speed'), Union('string', 'float', 'null')]
    public string|float|null $speed;

    /**
     * @var ?value-of<CartesiaExperimentalControlsEmotion> $emotion Emotion and intensity applied to the Cartesia voice.
     */
    #[JsonProperty('emotion')]
    public ?string $emotion;

    /**
     * @param array{
     *   speed?: (
     *    value-of<CartesiaSpeedControlZero>
     *   |float
     * )|null,
     *   emotion?: ?value-of<CartesiaExperimentalControlsEmotion>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->speed = $values['speed'] ?? null;
        $this->emotion = $values['emotion'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
