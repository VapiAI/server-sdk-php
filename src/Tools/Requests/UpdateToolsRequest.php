<?php

namespace Vapi\Tools\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Tools\Types\UpdateToolsRequestBody;

class UpdateToolsRequest extends JsonSerializableType
{
    /**
     * @var UpdateToolsRequestBody $body
     */
    public UpdateToolsRequestBody $body;

    /**
     * @param array{
     *   body: UpdateToolsRequestBody,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
