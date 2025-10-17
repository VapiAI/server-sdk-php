<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GeminiMultimodalLiveSpeechConfig extends JsonSerializableType
{
    /**
     * @var GeminiMultimodalLiveVoiceConfig $voiceConfig
     */
    #[JsonProperty('voiceConfig')]
    public GeminiMultimodalLiveVoiceConfig $voiceConfig;

    /**
     * @param array{
     *   voiceConfig: GeminiMultimodalLiveVoiceConfig,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->voiceConfig = $values['voiceConfig'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
