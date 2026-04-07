<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class FallbackInworldVoice extends JsonSerializableType
{
    /**
     * @var ?bool $cachingEnabled This is the flag to toggle voice caching for the assistant.
     */
    #[JsonProperty('cachingEnabled')]
    public ?bool $cachingEnabled;

    /**
     * Available voices by language:
     * • en: Alex, Ashley, Craig, Deborah, Dennis, Edward, Elizabeth, Hades, Julia, Pixie, Mark, Olivia, Priya, Ronald, Sarah, Shaun, Theodore, Timothy, Wendy, Dominus, Hana, Clive, Carter, Blake, Luna
     * • zh: Yichen, Xiaoyin, Xinyi, Jing
     * • nl: Erik, Katrien, Lennart, Lore
     * • fr: Alain, Hélène, Mathieu, Étienne
     * • de: Johanna, Josef
     * • it: Gianni, Orietta
     * • ja: Asuka, Satoshi
     * • ko: Hyunwoo, Minji, Seojun, Yoona
     * • pl: Szymon, Wojciech
     * • pt: Heitor, Maitê
     * • es: Diego, Lupita, Miguel, Rafael
     * • ru: Svetlana, Elena, Dmitry, Nikolai
     * • hi: Riya, Manoj
     * • he: Yael, Oren
     * • ar: Nour, Omar
     *
     * @var value-of<FallbackInworldVoiceVoiceId> $voiceId
     */
    #[JsonProperty('voiceId')]
    public string $voiceId;

    /**
     * @var ?value-of<FallbackInworldVoiceModel> $model This is the model that will be used.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<FallbackInworldVoiceLanguageCode> $languageCode Language code for Inworld TTS synthesis
     */
    #[JsonProperty('languageCode')]
    public ?string $languageCode;

    /**
     * A floating point number between 0, exclusive, and 2, inclusive. If equal to null or not provided, the model's default temperature of 1.1 will be used. The temperature parameter controls variance.
     * Higher values will make the output more random and can lead to more expressive results. Lower values will make it more deterministic.
     * See https://docs.inworld.ai/docs/tts/capabilities/generating-audio#additional-configurations for more details.
     *
     * @var ?float $temperature
     */
    #[JsonProperty('temperature')]
    public ?float $temperature;

    /**
     * A floating point number between 0.5, inclusive, and 1.5, inclusive. If equal to null or not provided, the model's default speaking speed of 1.0 will be used.
     * Values above 0.8 are recommended for higher quality.
     * See https://docs.inworld.ai/docs/tts/capabilities/generating-audio#additional-configurations for more details.
     *
     * @var ?float $speakingRate
     */
    #[JsonProperty('speakingRate')]
    public ?float $speakingRate;

    /**
     * @var ?ChunkPlan $chunkPlan This is the plan for chunking the model output before it is sent to the voice provider.
     */
    #[JsonProperty('chunkPlan')]
    public ?ChunkPlan $chunkPlan;

    /**
     * @param array{
     *   voiceId: value-of<FallbackInworldVoiceVoiceId>,
     *   cachingEnabled?: ?bool,
     *   model?: ?value-of<FallbackInworldVoiceModel>,
     *   languageCode?: ?value-of<FallbackInworldVoiceLanguageCode>,
     *   temperature?: ?float,
     *   speakingRate?: ?float,
     *   chunkPlan?: ?ChunkPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cachingEnabled = $values['cachingEnabled'] ?? null;
        $this->voiceId = $values['voiceId'];
        $this->model = $values['model'] ?? null;
        $this->languageCode = $values['languageCode'] ?? null;
        $this->temperature = $values['temperature'] ?? null;
        $this->speakingRate = $values['speakingRate'] ?? null;
        $this->chunkPlan = $values['chunkPlan'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
