<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class OpenAiReasonerSkill extends JsonSerializableType
{
    /**
     * @var string $name Unique name within this assistant.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var string $description Explain when the reasoner should load this skill. Always visible in its catalog.
     */
    #[JsonProperty('description')]
    public string $description;

    /**
     * @var string $content Full skill instructions, loaded only while this skill is active.
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @var ?array<OpenAiReasonerSkillToolsItem> $tools Tools available only after loading this skill. Can be combined with toolIds.
     */
    #[JsonProperty('tools'), ArrayType([OpenAiReasonerSkillToolsItem::class])]
    public ?array $tools;

    /**
     * @var ?array<string> $toolIds Existing organization-owned tools available only after loading this skill.
     */
    #[JsonProperty('toolIds'), ArrayType(['string'])]
    public ?array $toolIds;

    /**
     * @param array{
     *   name: string,
     *   description: string,
     *   content: string,
     *   tools?: ?array<OpenAiReasonerSkillToolsItem>,
     *   toolIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->description = $values['description'];
        $this->content = $values['content'];
        $this->tools = $values['tools'] ?? null;
        $this->toolIds = $values['toolIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
