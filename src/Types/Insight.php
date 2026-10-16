<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

/**
 * A saved insight returned by the API, including its visualization type, identity, organization, and lifecycle timestamps.
 */
class Insight extends JsonSerializableType
{
    /**
     * @var ?string $name This is the name of the Insight.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var value-of<InsightType> $type This is the type of the Insight.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $id This is the unique identifier for the Insight.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that this Insight belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the Insight was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the Insight was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?string $systemKey Stable server-owned identifier for system-created insights.
     */
    #[JsonProperty('systemKey')]
    public ?string $systemKey;

    /**
     * @param array{
     *   type: value-of<InsightType>,
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   name?: ?string,
     *   systemKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->type = $values['type'];
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->systemKey = $values['systemKey'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
