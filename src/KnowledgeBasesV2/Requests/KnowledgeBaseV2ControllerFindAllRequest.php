<?php

namespace Vapi\KnowledgeBasesV2\Requests;

use Vapi\Core\Json\JsonSerializableType;

class KnowledgeBaseV2ControllerFindAllRequest extends JsonSerializableType
{
    /**
     * @var ?float $limit
     */
    public ?float $limit;

    /**
     * @param array{
     *   limit?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->limit = $values['limit'] ?? null;
    }
}
