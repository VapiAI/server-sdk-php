<?php

namespace Vapi\Files\Requests;

use Vapi\Core\Json\JsonSerializableType;

class ListFilesRequest extends JsonSerializableType
{
    /**
     * @var string $purpose
     */
    public string $purpose;

    /**
     * @param array{
     *   purpose: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->purpose = $values['purpose'];
    }
}
