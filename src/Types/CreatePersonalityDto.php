<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CreatePersonalityDto extends JsonSerializableType
{
    /**
     * @var string $name This is the name of the personality (e.g., "Confused Carl", "Rude Rob").
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * This is the full assistant configuration for this personality.
     * It defines the tester's voice, model, behavior via system prompt, and other settings.
     *
     * @var CreateAssistantDto $assistant
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
