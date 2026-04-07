<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ServerMessageAssistantSpeech extends JsonSerializableType
{
    /**
     * @var ?ServerMessageAssistantSpeechPhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ServerMessageAssistantSpeechPhoneNumber $phoneNumber;

    /**
     * @var value-of<ServerMessageAssistantSpeechType> $type This is the type of the message. "assistant-speech" is sent as assistant audio is being played.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * The full assistant text for the current turn. This is the complete text,
     * not an incremental delta — consumers should use `timing` metadata (e.g.
     * `wordsSpoken`) to determine which portion has been spoken so far.
     *
     * @var string $text
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var ?float $turn This is the turn number of the assistant speech event (0-indexed).
     */
    #[JsonProperty('turn')]
    public ?float $turn;

    /**
     * @var ?value-of<ServerMessageAssistantSpeechSource> $source Indicates how the text was sourced.
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * Optional timing metadata. Shape depends on `timing.type`:
     *
     * - `word-alignment` (ElevenLabs): per-character timing at playback
     *   cadence. words[] includes space entries. Best consumed by tracking
     *   a running character count: join timing.words, add to a char cursor,
     *   and highlight text up to that position. No interpolation needed.
     *
     * - `word-progress` (Minimax with voice.subtitleType: 'word'): cursor-
     *   based word count per TTS segment. Use wordsSpoken as the anchor,
     *   interpolate forward using segmentDurationMs or timing.words until
     *   the next event arrives.
     *
     * When absent, the event is a text-only fallback for providers without
     * word-level timing (e.g. Cartesia, Deepgram, Azure). Text emits once
     * per TTS chunk when audio is playing. Optionally interpolate a word
     * cursor at ~3.5 words/sec between events for approximate tracking.
     *
     * @var ?ServerMessageAssistantSpeechTiming $timing
     */
    #[JsonProperty('timing')]
    public ?ServerMessageAssistantSpeechTiming $timing;

    /**
     * @var ?float $timestamp This is the timestamp of the message.
     */
    #[JsonProperty('timestamp')]
    public ?float $timestamp;

    /**
     * This is a live version of the `call.artifact`.
     *
     * This matches what is stored on `call.artifact` after the call.
     *
     * @var ?Artifact $artifact
     */
    #[JsonProperty('artifact')]
    public ?Artifact $artifact;

    /**
     * @var ?CreateAssistantDto $assistant This is the assistant that the message is associated with.
     */
    #[JsonProperty('assistant')]
    public ?CreateAssistantDto $assistant;

    /**
     * @var ?CreateCustomerDto $customer This is the customer that the message is associated with.
     */
    #[JsonProperty('customer')]
    public ?CreateCustomerDto $customer;

    /**
     * @var ?Call $call This is the call that the message is associated with.
     */
    #[JsonProperty('call')]
    public ?Call $call;

    /**
     * @var ?Chat $chat This is the chat object.
     */
    #[JsonProperty('chat')]
    public ?Chat $chat;

    /**
     * @param array{
     *   type: value-of<ServerMessageAssistantSpeechType>,
     *   text: string,
     *   phoneNumber?: ?ServerMessageAssistantSpeechPhoneNumber,
     *   turn?: ?float,
     *   source?: ?value-of<ServerMessageAssistantSpeechSource>,
     *   timing?: ?ServerMessageAssistantSpeechTiming,
     *   timestamp?: ?float,
     *   artifact?: ?Artifact,
     *   assistant?: ?CreateAssistantDto,
     *   customer?: ?CreateCustomerDto,
     *   call?: ?Call,
     *   chat?: ?Chat,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->type = $values['type'];
        $this->text = $values['text'];
        $this->turn = $values['turn'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->timing = $values['timing'] ?? null;
        $this->timestamp = $values['timestamp'] ?? null;
        $this->artifact = $values['artifact'] ?? null;
        $this->assistant = $values['assistant'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->call = $values['call'] ?? null;
        $this->chat = $values['chat'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
