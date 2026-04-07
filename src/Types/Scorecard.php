<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

class Scorecard extends JsonSerializableType
{
    /**
     * @var string $id This is the unique identifier for the scorecard.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that this scorecard belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the scorecard was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the scorecard was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?string $name This is the name of the scorecard. It is only for user reference and will not be used for any evaluation.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $description This is the description of the scorecard. It is only for user reference and will not be used for any evaluation.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * These are the metrics that will be used to evaluate the scorecard.
     * Each metric will have a set of conditions and points that will be used to generate the score.
     *
     * @var array<ScorecardMetric> $metrics
     */
    #[JsonProperty('metrics'), ArrayType([ScorecardMetric::class])]
    public array $metrics;

    /**
     * These are the assistant IDs that this scorecard is linked to.
     * When linked to assistants, this scorecard will be available for evaluation during those assistants' calls.
     *
     * @var ?array<string> $assistantIds
     */
    #[JsonProperty('assistantIds'), ArrayType(['string'])]
    public ?array $assistantIds;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   metrics: array<ScorecardMetric>,
     *   name?: ?string,
     *   description?: ?string,
     *   assistantIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->name = $values['name'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->metrics = $values['metrics'];
        $this->assistantIds = $values['assistantIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
