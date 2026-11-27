<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use DateTime;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\Union;

class GuardrailRuleSnapshot extends JsonSerializableType
{
    /**
     * @var DateTime $updatedAt Millisecond timestamp from the last-read resource.
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
     * @var string $instructions Evaluated instructions, generated from authoring or supplied in advanced mode.
     */
    #[JsonProperty('instructions')]
    public string $instructions;

    /**
     * @var value-of<GuardrailRuleSnapshotSensitivity> $sensitivity Evaluation sensitivity; numeric cutoffs are internal and provisional.
     */
    #[JsonProperty('sensitivity')]
    public string $sensitivity;

    /**
     * @var (
     *    GuardrailRuleSnapshotActionZero
     *   |GuardrailEscalateAction
     * ) $action Supplied PATCH actions replace the complete variant.
     */
    #[JsonProperty('action'), Union(GuardrailRuleSnapshotActionZero::class, GuardrailEscalateAction::class)]
    public GuardrailRuleSnapshotActionZero|GuardrailEscalateAction $action;

    /**
     * @param array{
     *   updatedAt: DateTime,
     *   name: string,
     *   instructions: string,
     *   sensitivity: value-of<GuardrailRuleSnapshotSensitivity>,
     *   action: (
     *    GuardrailRuleSnapshotActionZero
     *   |GuardrailEscalateAction
     * ),
     *   authoring?: ?GuardrailAuthoring,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->updatedAt = $values['updatedAt'];
        $this->name = $values['name'];
        $this->authoring = $values['authoring'] ?? null;
        $this->instructions = $values['instructions'];
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
