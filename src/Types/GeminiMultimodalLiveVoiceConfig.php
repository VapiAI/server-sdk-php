<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Voice selection configuration for Gemini Multimodal Live.
 */
class GeminiMultimodalLiveVoiceConfig extends JsonSerializableType
{
    /**
     * @var GeminiMultimodalLivePrebuiltVoiceConfig $prebuiltVoiceConfig Prebuilt voice used for Gemini Multimodal Live speech output.
     */
    #[JsonProperty('prebuiltVoiceConfig')]
    public GeminiMultimodalLivePrebuiltVoiceConfig $prebuiltVoiceConfig;

    /**
     * @param array{
     *   prebuiltVoiceConfig: GeminiMultimodalLivePrebuiltVoiceConfig,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->prebuiltVoiceConfig = $values['prebuiltVoiceConfig'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
