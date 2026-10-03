<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class StructuredOutputRerunResponse extends JsonSerializableType
{
    /**
     * @var ?string $workflowId This is the id of the workflow processing the rerun.
     */
    #[JsonProperty('workflowId')]
    public ?string $workflowId;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   message: string,
     *   workflowId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->workflowId = $values['workflowId'] ?? null;
        $this->message = $values['message'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
