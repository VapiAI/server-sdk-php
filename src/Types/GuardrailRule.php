<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\Union;

class GuardrailRule extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

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
     * @var ?string $instructions Evaluated instructions, generated from authoring or supplied in advanced mode.
     */
    #[JsonProperty('instructions')]
    public ?string $instructions;

    /**
     * @var value-of<GuardrailRuleSensitivity> $sensitivity Evaluation sensitivity; numeric cutoffs are internal and provisional.
     */
    #[JsonProperty('sensitivity')]
    public string $sensitivity;

    /**
     * @var (
     *    GuardrailRuleActionZero
     *   |GuardrailEscalateAction
     * ) $action Supplied PATCH actions replace the complete variant.
     */
    #[JsonProperty('action'), Union(GuardrailRuleActionZero::class, GuardrailEscalateAction::class)]
    public GuardrailRuleActionZero|GuardrailEscalateAction $action;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   name: string,
     *   sensitivity: value-of<GuardrailRuleSensitivity>,
     *   action: (
     *    GuardrailRuleActionZero
     *   |GuardrailEscalateAction
     * ),
     *   authoring?: ?GuardrailAuthoring,
     *   instructions?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
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
