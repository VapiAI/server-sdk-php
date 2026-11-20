<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;
use Vapi\Core\Types\ArrayType;

class SaveGuardrailRuleDto extends JsonSerializableType
{
    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

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
     * @var ?value-of<SaveGuardrailRuleDtoSensitivity> $sensitivity Evaluation sensitivity; numeric cutoffs are internal and provisional.
     */
    #[JsonProperty('sensitivity')]
    public ?string $sensitivity;

    /**
     * @var (
     *    SaveGuardrailRuleDtoActionZero
     *   |GuardrailEscalateAction
     * )|null $action Supplied PATCH actions replace the complete variant.
     */
    #[JsonProperty('action'), Union(SaveGuardrailRuleDtoActionZero::class, GuardrailEscalateAction::class, 'null')]
    public SaveGuardrailRuleDtoActionZero|GuardrailEscalateAction|null $action;

    /**
     * @var GuardrailRuleSnapshot $expected Last-read configuration; the complete snapshot prevents lost edits.
     */
    #[JsonProperty('expected')]
    public GuardrailRuleSnapshot $expected;

    /**
     * @var ?array<string> $confirmedAssistantIds Current deduplicated assistant impact acknowledged before a shared save.
     */
    #[JsonProperty('confirmedAssistantIds'), ArrayType(['string'])]
    public ?array $confirmedAssistantIds;

    /**
     * @param array{
     *   expected: GuardrailRuleSnapshot,
     *   name?: ?string,
     *   authoring?: ?GuardrailAuthoring,
     *   instructions?: ?string,
     *   sensitivity?: ?value-of<SaveGuardrailRuleDtoSensitivity>,
     *   action?: (
     *    SaveGuardrailRuleDtoActionZero
     *   |GuardrailEscalateAction
     * )|null,
     *   confirmedAssistantIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->authoring = $values['authoring'] ?? null;
        $this->instructions = $values['instructions'] ?? null;
        $this->sensitivity = $values['sensitivity'] ?? null;
        $this->action = $values['action'] ?? null;
        $this->expected = $values['expected'];
        $this->confirmedAssistantIds = $values['confirmedAssistantIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
