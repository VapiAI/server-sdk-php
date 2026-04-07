<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ClientMessageAssistantSpeech extends JsonSerializableType
{
    /**
     * @var ?ClientMessageAssistantSpeechPhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ClientMessageAssistantSpeechPhoneNumber $phoneNumber;

    /**
     * @var value-of<ClientMessageAssistantSpeechType> $type This is the type of the message. "assistant-speech" is sent as assistant audio is being played.
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
     * @var ?value-of<ClientMessageAssistantSpeechSource> $source Indicates how the text was sourced.
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
     * @var ?ClientMessageAssistantSpeechTiming $timing
     */
    #[JsonProperty('timing')]
    public ?ClientMessageAssistantSpeechTiming $timing;

    /**
     * @var ?float $timestamp This is the timestamp of the message.
     */
    #[JsonProperty('timestamp')]
    public ?float $timestamp;

    /**
     * @var ?Call $call This is the call that the message is associated with.
     */
    #[JsonProperty('call')]
    public ?Call $call;

    /**
     * @var ?CreateCustomerDto $customer This is the customer that the message is associated with.
     */
    #[JsonProperty('customer')]
    public ?CreateCustomerDto $customer;

    /**
     * @var ?CreateAssistantDto $assistant This is the assistant that the message is associated with.
     */
    #[JsonProperty('assistant')]
    public ?CreateAssistantDto $assistant;

    /**
     * @param array{
     *   type: value-of<ClientMessageAssistantSpeechType>,
     *   text: string,
     *   phoneNumber?: ?ClientMessageAssistantSpeechPhoneNumber,
     *   turn?: ?float,
     *   source?: ?value-of<ClientMessageAssistantSpeechSource>,
     *   timing?: ?ClientMessageAssistantSpeechTiming,
     *   timestamp?: ?float,
     *   call?: ?Call,
     *   customer?: ?CreateCustomerDto,
     *   assistant?: ?CreateAssistantDto,
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
        $this->call = $values['call'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->assistant = $values['assistant'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
