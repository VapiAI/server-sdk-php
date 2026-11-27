<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

/**
 * Metadata identifying a saved insight run and its lifecycle timestamps.
 */
class InsightRunResponse extends JsonSerializableType
{
    /**
     * @var string $id The unique identifier for the insight run.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $insightId The unique identifier for the insight that was run.
     */
    #[JsonProperty('insightId')]
    public string $insightId;

    /**
     * @var string $orgId The unique identifier for the organization that owns the run.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt The ISO 8601 timestamp when the insight run was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt The ISO 8601 timestamp when the insight run was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   insightId: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->insightId = $values['insightId'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
