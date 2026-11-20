<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

class StructuredOutputRunResult extends JsonSerializableType
{
    /**
     * @var string $name This is the name of the structured output that produced this value.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var (
     *    string
     *   |float
     *   |bool
     *   |array<string, mixed>
     *   |array<mixed>
     * )|null $result This is the extracted value, shaped by the structured output's schema.
     */
    #[JsonProperty('result'), Union('string', 'float', 'bool', ['string' => 'mixed'], ['mixed'], 'null')]
    public string|float|bool|array|null $result;

    /**
     * @var ?ComplianceOverride $compliancePlan
     */
    #[JsonProperty('compliancePlan')]
    public ?ComplianceOverride $compliancePlan;

    /**
     * @param array{
     *   name: string,
     *   result?: (
     *    string
     *   |float
     *   |bool
     *   |array<string, mixed>
     *   |array<mixed>
     * )|null,
     *   compliancePlan?: ?ComplianceOverride,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->result = $values['result'] ?? null;
        $this->compliancePlan = $values['compliancePlan'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
