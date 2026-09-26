<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * A directed connection between two workflow nodes, with an optional AI-evaluated transition condition.
 */
class Edge extends JsonSerializableType
{
    /**
     * @var ?AiEdgeCondition $condition Condition that must evaluate to true to follow this edge.
     */
    #[JsonProperty('condition')]
    public ?AiEdgeCondition $condition;

    /**
     * @var string $from Name of the source workflow node.
     */
    #[JsonProperty('from')]
    public string $from;

    /**
     * @var string $to Name of the destination workflow node.
     */
    #[JsonProperty('to')]
    public string $to;

    /**
     * @var ?array<string, mixed> $metadata This is for metadata you want to store on the edge.
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   from: string,
     *   to: string,
     *   condition?: ?AiEdgeCondition,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->condition = $values['condition'] ?? null;
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
