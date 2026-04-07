<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class EndpointedSpeechLowConfidenceOptions extends JsonSerializableType
{
    /**
     * This is the minimum confidence threshold.
     * Transcripts with confidence below this value will be discarded.
     *
     * @default confidenceMax - 0.2
     *
     * @var ?float $confidenceMin
     */
    #[JsonProperty('confidenceMin')]
    public ?float $confidenceMin;

    /**
     * This is the maximum confidence threshold.
     * Transcripts with confidence at or above this value will be processed normally.
     *
     * @default transcriber's confidenceThreshold
     *
     * @var ?float $confidenceMax
     */
    #[JsonProperty('confidenceMax')]
    public ?float $confidenceMax;

    /**
     * @param array{
     *   confidenceMin?: ?float,
     *   confidenceMax?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->confidenceMin = $values['confidenceMin'] ?? null;
        $this->confidenceMax = $values['confidenceMax'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
