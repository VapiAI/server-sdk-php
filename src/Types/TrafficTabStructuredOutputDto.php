<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class TrafficTabStructuredOutputDto extends JsonSerializableType
{
    /**
     * @var string $structuredOutputId
     */
    #[JsonProperty('structuredOutputId')]
    public string $structuredOutputId;

    /**
     * @var value-of<TrafficTabStructuredOutputDtoType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var float $present Calls in the window where this output produced a result.
     */
    #[JsonProperty('present')]
    public float $present;

    /**
     * @var ?TrafficTabStructuredOutputNumericDto $numeric
     */
    #[JsonProperty('numeric')]
    public ?TrafficTabStructuredOutputNumericDto $numeric;

    /**
     * @var ?array<TrafficTabStructuredOutputValueCountDto> $valueCounts Top 10 values by count, for string/boolean outputs.
     */
    #[JsonProperty('valueCounts'), ArrayType([TrafficTabStructuredOutputValueCountDto::class])]
    public ?array $valueCounts;

    /**
     * @param array{
     *   structuredOutputId: string,
     *   type: value-of<TrafficTabStructuredOutputDtoType>,
     *   present: float,
     *   numeric?: ?TrafficTabStructuredOutputNumericDto,
     *   valueCounts?: ?array<TrafficTabStructuredOutputValueCountDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->structuredOutputId = $values['structuredOutputId'];
        $this->type = $values['type'];
        $this->present = $values['present'];
        $this->numeric = $values['numeric'] ?? null;
        $this->valueCounts = $values['valueCounts'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
