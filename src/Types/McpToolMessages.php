<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Per-tool message overrides for a tool discovered through an MCP server.
 */
class McpToolMessages extends JsonSerializableType
{
    /**
     * @var string $name The name of the tool from the MCP server.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?array<McpToolMessagesMessagesItem> $messages Custom messages for this specific tool. Set to an empty array to suppress all messages for this tool. If not provided, the tool will use the default messages from the parent MCP tool configuration. Multiple request-start messages are variants. For request-response-delayed, same timing means variants and different timings mean staged updates.
     */
    #[JsonProperty('messages'), ArrayType([McpToolMessagesMessagesItem::class])]
    public ?array $messages;

    /**
     * @param array{
     *   name: string,
     *   messages?: ?array<McpToolMessagesMessagesItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->messages = $values['messages'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
