<?php

namespace Vapi\SimulationSuites\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Types\SimulationSuiteTargetAssignment;

class UpdateSimulationSuiteDto extends JsonSerializableType
{
    /**
     * @var ?string $name This is the name of the simulation suite.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $slackWebhookUrl This is the Slack webhook URL for notifications.
     */
    #[JsonProperty('slackWebhookUrl')]
    public ?string $slackWebhookUrl;

    /**
     * @var ?array<string> $simulationIds This is the list of simulation IDs to include in the suite (replaces existing).
     */
    #[JsonProperty('simulationIds'), ArrayType(['string'])]
    public ?array $simulationIds;

    /**
     * @var ?array<SimulationSuiteTargetAssignment> $targetAssignments Optional assistant or squad assignments (replaces existing).
     */
    #[JsonProperty('targetAssignments'), ArrayType([SimulationSuiteTargetAssignment::class])]
    public ?array $targetAssignments;

    /**
     * Optional folder path for organizing simulation suites.
     * Supports up to 3 levels (e.g., "dept/feature/variant").
     * Set to null to remove from folder.
     *
     * @var ?string $path
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @param array{
     *   name?: ?string,
     *   slackWebhookUrl?: ?string,
     *   simulationIds?: ?array<string>,
     *   targetAssignments?: ?array<SimulationSuiteTargetAssignment>,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->slackWebhookUrl = $values['slackWebhookUrl'] ?? null;
        $this->simulationIds = $values['simulationIds'] ?? null;
        $this->targetAssignments = $values['targetAssignments'] ?? null;
        $this->path = $values['path'] ?? null;
    }
}
