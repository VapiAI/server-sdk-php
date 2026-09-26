<?php

namespace Vapi\SimulationSuites\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Types\SimulationSuiteTargetAssignment;

class CreateSimulationSuiteDto extends JsonSerializableType
{
    /**
     * @var string $name The display name of the suite.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $slackWebhookUrl A Slack incoming-webhook URL notified when the suite runs.
     */
    #[JsonProperty('slackWebhookUrl')]
    public ?string $slackWebhookUrl;

    /**
     * @var array<string> $simulationIds The IDs of the simulations included in the suite.
     */
    #[JsonProperty('simulationIds'), ArrayType(['string'])]
    public array $simulationIds;

    /**
     * @var ?array<SimulationSuiteTargetAssignment> $targetAssignments The assistants or squads the suite's simulations run against.
     */
    #[JsonProperty('targetAssignments'), ArrayType([SimulationSuiteTargetAssignment::class])]
    public ?array $targetAssignments;

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
     * @param array{
     *   name: string,
     *   simulationIds: array<string>,
     *   slackWebhookUrl?: ?string,
     *   targetAssignments?: ?array<SimulationSuiteTargetAssignment>,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->slackWebhookUrl = $values['slackWebhookUrl'] ?? null;
        $this->simulationIds = $values['simulationIds'];
        $this->targetAssignments = $values['targetAssignments'] ?? null;
        $this->path = $values['path'] ?? null;
    }
}
