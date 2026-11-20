<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class GuardrailEscalateAction extends JsonSerializableType
{
    /**
     * @var value-of<GuardrailEscalateActionType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $toolId Existing same-organization tool; attachment is checked at assignment. Tool edits/deletion can invalidate the action: activation must revalidate the current tool and arguments, and use failurePolicy on failure.
     */
    #[JsonProperty('toolId')]
    public string $toolId;

    /**
     * @var array<string, mixed> $arguments Parameter names follow the normalized tool schema (SMS uses body/to).
     */
    #[JsonProperty('arguments'), ArrayType(['string' => 'mixed'])]
    public array $arguments;

    /**
     * @param array{
     *   type: value-of<GuardrailEscalateActionType>,
     *   toolId: string,
     *   arguments: array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->toolId = $values['toolId'];
        $this->arguments = $values['arguments'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
