<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Selects a prebuilt voice for Gemini Multimodal Live audio output.
 */
class GeminiMultimodalLivePrebuiltVoiceConfig extends JsonSerializableType
{
    /**
     * @var value-of<GeminiMultimodalLivePrebuiltVoiceConfigVoiceName> $voiceName Prebuilt Gemini voice used for audio output.
     */
    #[JsonProperty('voiceName')]
    public string $voiceName;

    /**
     * @param array{
     *   voiceName: value-of<GeminiMultimodalLivePrebuiltVoiceConfigVoiceName>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->voiceName = $values['voiceName'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
