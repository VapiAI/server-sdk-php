<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CreateSesameVoiceDto extends JsonSerializableType
{
    /**
     * This is the audio file of the utterance to clone the voice from.
     * Consumed by multer via FileInterceptor('file'), so it never reaches
     * class-validator; declared here (like CreateFileDTO.file) so the OpenAPI
     * spec is truthful about the multipart request body.
     *
     * @var string $file
     */
    #[JsonProperty('file')]
    public string $file;

    /**
     * @var string $voiceName The name of the voice.
     */
    #[JsonProperty('voiceName')]
    public string $voiceName;

    /**
     * @var string $transcription The transcript of the utterance.
     */
    #[JsonProperty('transcription')]
    public string $transcription;

    /**
     * @param array{
     *   file: string,
     *   voiceName: string,
     *   transcription: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->file = $values['file'];
        $this->voiceName = $values['voiceName'];
        $this->transcription = $values['transcription'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
