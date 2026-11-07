<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardAssistantReferenceDto extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $latestVersion Current assistant.latest_version label; omitted when unavailable, never a goal revision.
     */
    #[JsonProperty('latestVersion')]
    public ?string $latestVersion;

    /**
     * @param array{
     *   id: string,
     *   name?: ?string,
     *   latestVersion?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'] ?? null;
        $this->latestVersion = $values['latestVersion'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
