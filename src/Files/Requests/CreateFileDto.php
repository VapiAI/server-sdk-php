<?php

namespace Vapi\Files\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Utils\File;
use Vapi\Files\Types\CreateFilesRequestPurpose;
use Vapi\Core\Json\JsonProperty;

class CreateFileDto extends JsonSerializableType
{
    /**
     * @var File $file
     */
    public File $file;

    /**
     * @var ?value-of<CreateFilesRequestPurpose> $purpose Optional product flow that owns the uploaded file.
     */
    #[JsonProperty('purpose')]
    public ?string $purpose;

    /**
     * @var ?string $metadata Optional JSON-encoded metadata for multipart uploads.
     */
    #[JsonProperty('metadata')]
    public ?string $metadata;

    /**
     * @param array{
     *   file: File,
     *   purpose?: ?value-of<CreateFilesRequestPurpose>,
     *   metadata?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->file = $values['file'];
        $this->purpose = $values['purpose'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
    }
}
