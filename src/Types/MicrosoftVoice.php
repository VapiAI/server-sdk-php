<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class MicrosoftVoice extends JsonSerializableType
{
    /**
     * @var ?bool $cachingEnabled This is the flag to toggle voice caching for the assistant.
     */
    #[JsonProperty('cachingEnabled')]
    public ?bool $cachingEnabled;

    /**
     * @var value-of<MicrosoftVoiceVoiceId> $voiceId MAI-Voice-2 voice ID. Built-in voices listed in enum.
     */
    #[JsonProperty('voiceId')]
    public string $voiceId;

    /**
     * @var ?value-of<MicrosoftVoiceStyle> $style Speaking style applied via mstts:express-as on every request. Unknown styles are ignored by Azure and fall back to neutral.
     */
    #[JsonProperty('style')]
    public ?string $style;

    /**
     * @var ?float $styleDegree Style intensity (0.01–2). Default 1 = the predefined style strength. Only applies when `style` is set.
     */
    #[JsonProperty('styleDegree')]
    public ?float $styleDegree;

    /**
     * @var ?value-of<MicrosoftVoiceRole> $role Role-play (age/gender imitation). Requires `style` to be set; ignored otherwise.
     */
    #[JsonProperty('role')]
    public ?string $role;

    /**
     * @var ?ChunkPlan $chunkPlan This is the plan for chunking the model output before it is sent to the voice provider.
     */
    #[JsonProperty('chunkPlan')]
    public ?ChunkPlan $chunkPlan;

    /**
     * @var ?float $speed This is the speed multiplier that will be used.
     */
    #[JsonProperty('speed')]
    public ?float $speed;

    /**
     * @var ?FallbackPlan $fallbackPlan This is the plan for voice provider fallbacks in the event that the primary voice provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackPlan $fallbackPlan;

    /**
     * @param array{
     *   voiceId: value-of<MicrosoftVoiceVoiceId>,
     *   cachingEnabled?: ?bool,
     *   style?: ?value-of<MicrosoftVoiceStyle>,
     *   styleDegree?: ?float,
     *   role?: ?value-of<MicrosoftVoiceRole>,
     *   chunkPlan?: ?ChunkPlan,
     *   speed?: ?float,
     *   fallbackPlan?: ?FallbackPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cachingEnabled = $values['cachingEnabled'] ?? null;
        $this->voiceId = $values['voiceId'];
        $this->style = $values['style'] ?? null;
        $this->styleDegree = $values['styleDegree'] ?? null;
        $this->role = $values['role'] ?? null;
        $this->chunkPlan = $values['chunkPlan'] ?? null;
        $this->speed = $values['speed'] ?? null;
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
