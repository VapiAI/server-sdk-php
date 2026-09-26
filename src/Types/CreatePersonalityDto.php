<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CreatePersonalityDto extends JsonSerializableType
{
    /**
     * @var string $name The display name of the personality, for example `Impatient customer`.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var CreateAssistantDto $assistant The assistant configuration for the AI tester: the model, voice, and system prompt that determine how the AI tester behaves during the conversation.
     */
    #[JsonProperty('assistant')]
    public CreateAssistantDto $assistant;

    /**
     * Optional folder path for organizing personalities.
     * Supports up to 3 levels (e.g., "dept/feature/variant").
     * Maps to GitOps resource folder structure.
     *
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @param array{
     *   name: string,
     *   assistant: CreateAssistantDto,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->assistant = $values['assistant'];
        $this->path = $values['path'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
