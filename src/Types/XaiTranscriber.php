<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class XaiTranscriber extends JsonSerializableType
{
    /**
     * @var ?value-of<XaiTranscriberModel> $model The xAI speech-to-text model to use. xAI currently exposes a single STT model — placeholder for future model selection.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<XaiTranscriberLanguage> $language Single language for transcription as an ISO 639-1 code (e.g., `en`, `es`). Defaults to `en` if not set. xAI auto-detects when omitted via the API but Vapi defaults to English for deterministic behavior.
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var ?FallbackTranscriberPlan $fallbackPlan This is the plan for transcriber provider fallbacks in the event that the primary transcriber provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackTranscriberPlan $fallbackPlan;

    /**
     * @param array{
     *   model?: ?value-of<XaiTranscriberModel>,
     *   language?: ?value-of<XaiTranscriberLanguage>,
     *   fallbackPlan?: ?FallbackTranscriberPlan,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->model = $values['model'] ?? null;
        $this->language = $values['language'] ?? null;
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
