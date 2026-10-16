<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantManagedVapiAgentsDto extends JsonSerializableType
{
    /**
     * @var string $agentId The Vapi Agents agent that manages the assistant.
     */
    #[JsonProperty('agentId')]
    public string $agentId;

    /**
     * @var string $agentUrl The agent's page in Vapi Agents.
     */
    #[JsonProperty('agentUrl')]
    public string $agentUrl;

    /**
     * @var string $mcpUrl The Vapi Agents MCP server, where an AI client makes the change instead.
     */
    #[JsonProperty('mcpUrl')]
    public string $mcpUrl;

    /**
     * @param array{
     *   agentId: string,
     *   agentUrl: string,
     *   mcpUrl: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->agentId = $values['agentId'];
        $this->agentUrl = $values['agentUrl'];
        $this->mcpUrl = $values['mcpUrl'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
