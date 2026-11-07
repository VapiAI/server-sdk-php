<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Model, voice, transcription, endpointing, and total latency measurements for a conversation turn.
 */
class TurnLatency extends JsonSerializableType
{
    /**
     * This is the time in milliseconds from the start of the turn's model stage to the model's first output token.
     * It includes knowledge-base retrieval and request routing before the provider request. 0 when it was not measured on this turn.
     *
     * @var ?float $modelLatency
     */
    #[JsonProperty('modelLatency')]
    public ?float $modelLatency;

    /**
     * This is the time in milliseconds from the model's first output token to the first reply audio reaching Vapi's turn-taking buffer.
     * It includes the wait to collect enough text for the first voice request (set by `voice.chunkPlan`), the voice provider's time to first audio, and any sample-rate conversion. 0 when it was not measured on this turn.
     *
     * @var ?float $voiceLatency
     */
    #[JsonProperty('voiceLatency')]
    public ?float $voiceLatency;

    /**
     * This is the time in milliseconds from the user's last voice activity signal, normally the end of speech, to the transcriber returning the words of that speech.
     * 0 when it was not measured, including when the words arrived before that signal.
     *
     * @var ?float $transcriberLatency
     */
    #[JsonProperty('transcriberLatency')]
    public ?float $transcriberLatency;

    /**
     * This is the time in milliseconds from the transcriber returning the words to Vapi deciding the turn is over and sending it to the model.
     * 0 when the reply was not triggered by sending a user transcript to the model.
     *
     * @var ?float $endpointingLatency
     */
    #[JsonProperty('endpointingLatency')]
    public ?float $endpointingLatency;

    /**
     * This is the time in milliseconds from the user's last voice activity signal to Vapi starting to send the assistant's reply audio.
     * It is computed as `transcriberLatency` + `endpointingLatency` + the time from that decision to the reply starting, so when `transcriberLatency` is 0 because it was not measured, this total leaves that interval out. `modelLatency` and `voiceLatency` fall inside the last part, so the fields do not add up to this value.
     *
     * @var ?float $turnLatency
     */
    #[JsonProperty('turnLatency')]
    public ?float $turnLatency;

    /**
     * @param array{
     *   modelLatency?: ?float,
     *   voiceLatency?: ?float,
     *   transcriberLatency?: ?float,
     *   endpointingLatency?: ?float,
     *   turnLatency?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->modelLatency = $values['modelLatency'] ?? null;
        $this->voiceLatency = $values['voiceLatency'] ?? null;
        $this->transcriberLatency = $values['transcriberLatency'] ?? null;
        $this->endpointingLatency = $values['endpointingLatency'] ?? null;
        $this->turnLatency = $values['turnLatency'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
