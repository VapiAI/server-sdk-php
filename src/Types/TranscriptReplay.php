<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TranscriptReplay extends JsonSerializableType
{
    /**
     * This is the HTTPS URL of the recording, fetched when each run starts and
     * never stored. Use a presigned URL that stays valid until the run executes.
     * WAV, MP3, FLAC and OGG are supported; MP4 and M4A only when the file was
     * written for streaming.
     *
     * @var string $recordingUrl
     */
    #[JsonProperty('recordingUrl')]
    public string $recordingUrl;

    /**
     * This is the answer key, inline. Supply this or `answerKeyUrl`, not both.
     * Organizations with HIPAA, PCI or zero data retention enabled must use
     * `answerKeyUrl`, so no answer key is stored.
     *
     * @var ?TranscriptAnswerKey $answerKey
     */
    #[JsonProperty('answerKey')]
    public ?TranscriptAnswerKey $answerKey;

    /**
     * This is the HTTPS URL of a JSON answer key with the same shape as
     * `answerKey`, fetched when each run starts and never stored.
     *
     * @var ?string $answerKeyUrl
     */
    #[JsonProperty('answerKeyUrl')]
    public ?string $answerKeyUrl;

    /**
     * @param array{
     *   recordingUrl: string,
     *   answerKey?: ?TranscriptAnswerKey,
     *   answerKeyUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->recordingUrl = $values['recordingUrl'];
        $this->answerKey = $values['answerKey'] ?? null;
        $this->answerKeyUrl = $values['answerKeyUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
