<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class UserMessageMetadata extends JsonSerializableType
{
    /**
     * Per-word confidence scores from the transcriber. After consecutive
     * transcript fragments are merged into one message the list covers the whole
     * merged message, or is absent when any fragment lacked word scores.
     *
     * @var ?array<TranscriptWordConfidence> $wordLevelConfidence
     */
    #[JsonProperty('wordLevelConfidence'), ArrayType([TranscriptWordConfidence::class])]
    public ?array $wordLevelConfidence;

    /**
     * Marks a message injected out-of-band rather than produced by the
     * transcriber (e.g. an inbound SMS relayed into the conversation).
     *
     * @var ?string $type
     */
    #[JsonProperty('type')]
    public ?string $type;

    /**
     * The channel or address the out-of-band message arrived from (e.g. the
     * sender's phone number for an SMS).
     *
     * @var ?string $source
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @param array{
     *   wordLevelConfidence?: ?array<TranscriptWordConfidence>,
     *   type?: ?string,
     *   source?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->wordLevelConfidence = $values['wordLevelConfidence'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->source = $values['source'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
