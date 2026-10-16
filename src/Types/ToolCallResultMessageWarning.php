<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ToolCallResultMessageWarning extends JsonSerializableType
{
    /**
     * The kind of warning. Currently:
     * - `oversized-tool-response`: the tool's serialized response exceeded the
     *   recommended size and is likely to bloat the model context, increasing
     *   latency and risking truncation of earlier instructions.
     *
     * @var value-of<ToolCallResultMessageWarningType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var float $tokenCount The estimated number of tokens in the serialized tool response.
     */
    #[JsonProperty('tokenCount')]
    public float $tokenCount;

    /**
     * @var float $threshold The threshold (in tokens) above which the warning is raised.
     */
    #[JsonProperty('threshold')]
    public float $threshold;

    /**
     * @param array{
     *   type: value-of<ToolCallResultMessageWarningType>,
     *   tokenCount: float,
     *   threshold: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->tokenCount = $values['tokenCount'];
        $this->threshold = $values['threshold'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
