<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Lists backup transcriber configurations that can be used if the primary transcriber fails.
 */
class FallbackTranscriberPlan extends JsonSerializableType
{
    /**
     * @var ?array<FallbackTranscriberPlanTranscribersItem> $transcribers Transcriber configurations available when the primary transcriber fails.
     */
    #[JsonProperty('transcribers'), ArrayType([FallbackTranscriberPlanTranscribersItem::class])]
    public ?array $transcribers;

    /**
     * @param array{
     *   transcribers?: ?array<FallbackTranscriberPlanTranscribersItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->transcribers = $values['transcribers'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
