<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

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
 */
class ServerMessageAssistantSpeechTiming extends JsonSerializableType
{
    /**
     * @var (
     *    'word-alignment'
     *   |'word-progress'
     *   |'_unknown'
     * ) $type
     */
    public readonly string $type;

    /**
     * @var (
     *    AssistantSpeechWordAlignmentTiming
     *   |AssistantSpeechWordProgressTiming
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'word-alignment'
     *   |'word-progress'
     *   |'_unknown'
     * ),
     *   value: (
     *    AssistantSpeechWordAlignmentTiming
     *   |AssistantSpeechWordProgressTiming
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->value = $values['value'];
    }

    /**
     * @param AssistantSpeechWordAlignmentTiming $wordAlignment
     * @return ServerMessageAssistantSpeechTiming
     */
    public static function wordAlignment(AssistantSpeechWordAlignmentTiming $wordAlignment): ServerMessageAssistantSpeechTiming
    {
        return new ServerMessageAssistantSpeechTiming([
            'type' => 'word-alignment',
            'value' => $wordAlignment,
        ]);
    }

    /**
     * @param AssistantSpeechWordProgressTiming $wordProgress
     * @return ServerMessageAssistantSpeechTiming
     */
    public static function wordProgress(AssistantSpeechWordProgressTiming $wordProgress): ServerMessageAssistantSpeechTiming
    {
        return new ServerMessageAssistantSpeechTiming([
            'type' => 'word-progress',
            'value' => $wordProgress,
        ]);
    }

    /**
     * @return bool
     */
    public function isWordAlignment(): bool
    {
        return $this->value instanceof AssistantSpeechWordAlignmentTiming && $this->type === 'word-alignment';
    }

    /**
     * @return AssistantSpeechWordAlignmentTiming
     */
    public function asWordAlignment(): AssistantSpeechWordAlignmentTiming
    {
        if (!($this->value instanceof AssistantSpeechWordAlignmentTiming && $this->type === 'word-alignment')) {
            throw new Exception(
                "Expected word-alignment; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isWordProgress(): bool
    {
        return $this->value instanceof AssistantSpeechWordProgressTiming && $this->type === 'word-progress';
    }

    /**
     * @return AssistantSpeechWordProgressTiming
     */
    public function asWordProgress(): AssistantSpeechWordProgressTiming
    {
        if (!($this->value instanceof AssistantSpeechWordProgressTiming && $this->type === 'word-progress')) {
            throw new Exception(
                "Expected word-progress; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['type'] = $this->type;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->type) {
            case 'word-alignment':
                $value = $this->asWordAlignment()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'word-progress':
                $value = $this->asWordProgress()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param string $json
     */
    public static function fromJson(string $json): static
    {
        $decodedJson = JsonDecoder::decode($json);
        if (!is_array($decodedJson)) {
            throw new Exception("Unexpected non-array decoded type: " . gettype($decodedJson));
        }
        return self::jsonDeserialize($decodedJson);
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('type', $data)) {
            throw new Exception(
                "JSON data is missing property 'type'",
            );
        }
        $type = $data['type'];
        if (!(is_string($type))) {
            throw new Exception(
                "Expected property 'type' in JSON data to be string, instead received " . get_debug_type($data['type']),
            );
        }

        $args['type'] = $type;
        switch ($type) {
            case 'word-alignment':
                $args['value'] = AssistantSpeechWordAlignmentTiming::jsonDeserialize($data);
                break;
            case 'word-progress':
                $args['value'] = AssistantSpeechWordProgressTiming::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['type'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
