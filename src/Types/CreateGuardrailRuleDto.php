<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

class CreateGuardrailRuleDto extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?GuardrailAuthoring $authoring Structured editor input. Supplied PATCH authoring replaces the complete object; advanced text writes clear it to null.
     */
    #[JsonProperty('authoring')]
    public ?GuardrailAuthoring $authoring;

    /**
     * @var ?string $instructions Advanced text input. Do not supply it together with structured authoring.
     */
    #[JsonProperty('instructions')]
    public ?string $instructions;

    /**
     * @var value-of<CreateGuardrailRuleDtoSensitivity> $sensitivity Evaluation sensitivity; numeric cutoffs are internal and provisional.
     */
    #[JsonProperty('sensitivity')]
    public string $sensitivity;

    /**
     * @var (
     *    CreateGuardrailRuleDtoActionZero
     *   |GuardrailEscalateAction
     * ) $action Supplied PATCH actions replace the complete variant.
     */
    #[JsonProperty('action'), Union(CreateGuardrailRuleDtoActionZero::class, GuardrailEscalateAction::class)]
    public CreateGuardrailRuleDtoActionZero|GuardrailEscalateAction $action;

    /**
     * @param array{
     *   name: string,
     *   sensitivity: value-of<CreateGuardrailRuleDtoSensitivity>,
     *   action: (
     *    CreateGuardrailRuleDtoActionZero
     *   |GuardrailEscalateAction
     * ),
     *   authoring?: ?GuardrailAuthoring,
     *   instructions?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->authoring = $values['authoring'] ?? null;
        $this->instructions = $values['instructions'] ?? null;
        $this->sensitivity = $values['sensitivity'];
        $this->action = $values['action'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
