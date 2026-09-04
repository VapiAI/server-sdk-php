<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

class VoiceLibraryVoiceResponse extends JsonSerializableType
{
    /**
     * @var (
     *    string
     *   |float
     * )|null $age
     */
    #[JsonProperty('age'), Union('string', 'float', 'null')]
    public string|float|null $age;

    /**
     * @var string $voiceId
     */
    #[JsonProperty('voiceId')]
    public string $voiceId;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $publicOwnerId
     */
    #[JsonProperty('publicOwnerId')]
    public ?string $publicOwnerId;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @var ?string $gender
     */
    #[JsonProperty('gender')]
    public ?string $gender;

    /**
     * @var ?string $accent
     */
    #[JsonProperty('accent')]
    public ?string $accent;

    /**
     * @param array{
     *   voiceId: string,
     *   name: string,
     *   age?: (
     *    string
     *   |float
     * )|null,
     *   publicOwnerId?: ?string,
     *   description?: ?string,
     *   gender?: ?string,
     *   accent?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->age = $values['age'] ?? null;
        $this->voiceId = $values['voiceId'];
        $this->name = $values['name'];
        $this->publicOwnerId = $values['publicOwnerId'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->gender = $values['gender'] ?? null;
        $this->accent = $values['accent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
