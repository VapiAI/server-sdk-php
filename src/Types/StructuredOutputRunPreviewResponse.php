<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class StructuredOutputRunPreviewResponse extends JsonSerializableType
{
    /**
     * These are the structured outputs whose conditions gated them, keyed by
     * structured output id. Absent when nothing was skipped. An entry here means
     * no extraction ran and no cost was incurred for that output.
     *
     * @var ?array<string, SkippedStructuredOutput> $skipped
     */
    #[JsonProperty('skipped'), ArrayType(['string' => SkippedStructuredOutput::class])]
    public ?array $skipped;

    /**
     * @param array{
     *   skipped?: ?array<string, SkippedStructuredOutput>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->skipped = $values['skipped'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
