<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Fallback configuration for transcribing speech with Cartesia, including model and language.
 */
class FallbackCartesiaTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<FallbackCartesiaTranscriberModel> $model The Cartesia speech-to-text model used for transcription.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<FallbackCartesiaTranscriberLanguage> $language The language code used for transcription.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?float $turnStartThreshold Ink 2 speech likelihood above which a turn starts. Higher values require stronger speech evidence. Must exceed turnEagerEndThreshold, which is 0.4 when unset. When unset, the Cartesia server default (currently 0.8) applies. With startSpeakingPlan.smartEndpointingPlan unset, this affects when the assistant replies. A smart endpointing plan decides reply timing itself from Ink 2's partial and final transcripts, so with one set this only shapes the plan's input.
     */
    #[JsonProperty('turnStartThreshold')]
    public ?float $turnStartThreshold;

    /**
     * @var ?float $turnEagerEndThreshold Ink 2 speech likelihood below which an eager end fires. Higher values fire sooner. Must be below turnStartThreshold (0.8 when unset) and above turnEndThreshold (0.2 when unset). Eager ends are emitted as partial transcripts. With startSpeakingPlan.smartEndpointingPlan unset they do not start a model request, so tuning this changes when the event is observed rather than when the assistant replies. A smart endpointing plan receives them with Ink 2's other transcripts and decides reply timing itself. When unset, the Cartesia server default (currently 0.4) applies.
     */
    #[JsonProperty('turnEagerEndThreshold')]
    public ?float $turnEagerEndThreshold;

    /**
     * @var ?float $turnEndThreshold Ink 2 speech likelihood below which a turn ends. Higher values end the turn sooner. Must be below turnEagerEndThreshold, which is 0.4 when unset; values at or above that therefore require raising turnEagerEndThreshold as well. When unset, the Cartesia server default (currently 0.2) applies. With startSpeakingPlan.smartEndpointingPlan unset, this affects when the assistant replies. A smart endpointing plan decides reply timing itself from Ink 2's partial and final transcripts, so with one set this only shapes the plan's input.
     */
    #[JsonProperty('turnEndThreshold')]
    public ?float $turnEndThreshold;

    /**
     * @var ?int $turnEndTimeoutMs Maximum Ink 2 wait after speech stops, in milliseconds. Lower values force an earlier end. When unset, the Cartesia server default (currently 5600) applies. With startSpeakingPlan.smartEndpointingPlan unset, this affects when the assistant replies. A smart endpointing plan decides reply timing itself from Ink 2's partial and final transcripts, so with one set this only shapes the plan's input.
     */
    #[JsonProperty('turnEndTimeoutMs')]
    public ?int $turnEndTimeoutMs;

    /**
     * @param array{
     *   model?: ?value-of<FallbackCartesiaTranscriberModel>,
     *   language?: ?value-of<FallbackCartesiaTranscriberLanguage>,
     *   turnStartThreshold?: ?float,
     *   turnEagerEndThreshold?: ?float,
     *   turnEndThreshold?: ?float,
     *   turnEndTimeoutMs?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->turnStartThreshold = $values['turnStartThreshold'] ?? null;
        $this->turnEagerEndThreshold = $values['turnEagerEndThreshold'] ?? null;
        $this->turnEndThreshold = $values['turnEndThreshold'] ?? null;
        $this->turnEndTimeoutMs = $values['turnEndTimeoutMs'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
