<?php

namespace Vapi\KnowledgeBasesV2\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AttachKnowledgeBaseV2FileDto extends JsonSerializableType
{
    /**
     * @var string $fileId
     */
    #[JsonProperty('fileId')]
    public string $fileId;

    /**
     * @param array{
     *   fileId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->fileId = $values['fileId'];
    }
}
