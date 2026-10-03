<?php

namespace Vapi\Files\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Files\Types\ListFilesRequestPurpose;

class ListFilesRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<ListFilesRequestPurpose> $purpose Only return files with this purpose. When omitted, files of every purpose except composer attachments are returned.
     */
    public ?string $purpose;

    /**
     * @param array{
     *   purpose?: ?value-of<ListFilesRequestPurpose>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->purpose = $values['purpose'] ?? null;
    }
}
