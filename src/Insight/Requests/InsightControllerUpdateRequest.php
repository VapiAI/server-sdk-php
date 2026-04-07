<?php

namespace Vapi\Insight\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Insight\Types\InsightControllerUpdateRequestBody;

class InsightControllerUpdateRequest extends JsonSerializableType
{
    /**
     * @var InsightControllerUpdateRequestBody $body
     */
    public InsightControllerUpdateRequestBody $body;

    /**
     * @param array{
     *   body: InsightControllerUpdateRequestBody,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
