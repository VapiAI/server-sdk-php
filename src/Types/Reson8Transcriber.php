<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class Reson8Transcriber extends JsonSerializableType
{
    /**
     * @var ?value-of<Reson8TranscriberModel> $model The Reson8 speech-to-text endpoint to use. `turns` is Reson8's turn-detection endpoint.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?string $language Language for transcription (e.g. `nl`), or a comma-separated candidate list such as `nl,en` which constrains auto-detection. When omitted, Reson8 auto-detects the language per utterance. Supported: de, en, es, fr, fy, it, nl, pl, pt, sv.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?array<string> $keyterms Domain-specific terms to boost recognition (brand names, product codes, jargon). Sent to Reson8 as the `phrases` parameter. Max 250 phrases.
     */
    #[JsonProperty('keyterms'), ArrayType(['string'])]
    public ?array $keyterms;

    /**
     * @var ?string $customModelId A stored Reson8 phrase collection (custom model) id, managed via the Reson8 API or console.
     */
    #[JsonProperty('customModelId')]
    public ?string $customModelId;

    /**
     * @var ?float $eagerTurnProbability Threshold (0-1) at which Reson8 emits an eager turn-end candidate. Provider default 0.5.
     */
    #[JsonProperty('eagerTurnProbability')]
    public ?float $eagerTurnProbability;

    /**
     * @var ?float $finalTurnProbability Threshold (0-1) at which Reson8 confirms the end of a turn. Provider default 0.92.
     */
    #[JsonProperty('finalTurnProbability')]
    public ?float $finalTurnProbability;

    /**
     * @var ?value-of<Reson8TranscriberFillerMode> $fillerMode How Reson8 renders filler words in transcripts. Provider default `natural`.
     */
    #[JsonProperty('fillerMode')]
    public ?string $fillerMode;

    /**
     * @var ?FallbackTranscriberPlan $fallbackPlan This is the plan for transcriber provider fallbacks in the event that the primary transcriber provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackTranscriberPlan $fallbackPlan;

    /**
     * @param array{
     *   model?: ?value-of<Reson8TranscriberModel>,
     *   language?: ?string,
     *   keyterms?: ?array<string>,
     *   customModelId?: ?string,
     *   eagerTurnProbability?: ?float,
     *   finalTurnProbability?: ?float,
     *   fillerMode?: ?value-of<Reson8TranscriberFillerMode>,
     *   fallbackPlan?: ?FallbackTranscriberPlan,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->keyterms = $values['keyterms'] ?? null;
        $this->customModelId = $values['customModelId'] ?? null;
        $this->eagerTurnProbability = $values['eagerTurnProbability'] ?? null;
        $this->finalTurnProbability = $values['finalTurnProbability'] ?? null;
        $this->fillerMode = $values['fillerMode'] ?? null;
        $this->fallbackPlan = $values['fallbackPlan'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
