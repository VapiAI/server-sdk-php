<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AudioFormat extends JsonSerializableType
{
    /**
     * This is the sample rate of the call.
     *
     * @default 16000
     *
     * @var float $sampleRate
     */
    #[JsonProperty('sampleRate')]
    public float $sampleRate;

    /**
     * This is the audio format of the call.
     *
     * @default 'pcm_s16le'
     *
     * @var value-of<AudioFormatFormat> $format
     */
    #[JsonProperty('format')]
    public string $format;

    /**
     * This is the container format of the call.
     *
     * @default 'raw'
     *
     * @var ?value-of<AudioFormatContainer> $container
     */
    #[JsonProperty('container')]
    public ?string $container;

    /**
     * @param array{
     *   sampleRate: float,
     *   format: value-of<AudioFormatFormat>,
     *   container?: ?value-of<AudioFormatContainer>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sampleRate = $values['sampleRate'];
        $this->format = $values['format'];
        $this->container = $values['container'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
