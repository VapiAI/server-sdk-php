<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class Personality extends JsonSerializableType
{
    /**
     * @var string $id This is the unique identifier for the personality.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * This is the unique identifier for the organization this personality belongs to.
     * If null, this is a Vapi-provided default personality available to all organizations.
     *
     * @var ?string $orgId
     */
    #[JsonProperty('orgId')]
    public ?string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the personality was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the personality was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

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
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   name: string,
     *   assistant: CreateAssistantDto,
     *   orgId?: ?string,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->orgId = $values['orgId'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
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
