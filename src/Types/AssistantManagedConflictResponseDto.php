<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantManagedConflictResponseDto extends JsonSerializableType
{
    /**
     * @var value-of<AssistantManagedConflictResponseDtoError> $error Vapi Agents manages the assistant. The lock refuses writes to the assistant itself (update, replace, delete, restore, version delete, traffic splits) and to outcomes, monitors and structured outputs that link or unlink it. It doesn't cover what changes a call without writing the assistant: call-level assistantOverrides or assistantVersion, squad member pins and overrides, which phone number points at it, edits to the tools or knowledge bases it references, or Vapi's own model-retirement sweep.
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $message Why the write was rejected and how to make the change in Vapi Agents instead: the agent link, the Vapi Agents MCP URL with the steps to connect it, and which of its tools to call.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var AssistantManagedVapiAgentsDto $vapiAgents
     */
    #[JsonProperty('vapiAgents')]
    public AssistantManagedVapiAgentsDto $vapiAgents;

    /**
     * @param array{
     *   error: value-of<AssistantManagedConflictResponseDtoError>,
     *   message: string,
     *   vapiAgents: AssistantManagedVapiAgentsDto,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->message = $values['message'];
        $this->vapiAgents = $values['vapiAgents'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
