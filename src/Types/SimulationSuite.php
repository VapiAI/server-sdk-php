<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

class SimulationSuite extends JsonSerializableType
{
    /**
     * @var string $id This is the unique identifier for the simulation suite.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the organization this suite belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the suite was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the suite was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $name This is the name of the simulation suite.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $slackWebhookUrl This is the Slack webhook URL for notifications.
     */
    #[JsonProperty('slackWebhookUrl')]
    public ?string $slackWebhookUrl;

    /**
     * Optional folder path for organizing simulation suites.
     * Supports up to 3 levels (e.g., "dept/feature/variant").
     * Maps to GitOps resource folder structure.
     *
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @var array<string> $simulationIds This is the list of simulation IDs in this suite.
     */
    #[JsonProperty('simulationIds'), ArrayType(['string'])]
    public array $simulationIds;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   name: string,
     *   simulationIds: array<string>,
     *   slackWebhookUrl?: ?string,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->name = $values['name'];
        $this->slackWebhookUrl = $values['slackWebhookUrl'] ?? null;
        $this->path = $values['path'] ?? null;
        $this->simulationIds = $values['simulationIds'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
