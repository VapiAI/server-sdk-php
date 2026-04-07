<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ToolCallHookAction extends JsonSerializableType
{
    /**
     * @var value-of<ToolCallHookActionType> $type This is the type of action - must be "tool"
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var ?ToolCallHookActionTool $tool This is the tool to call. To use an existing tool, send `toolId` instead.
     */
    #[JsonProperty('tool')]
    public ?ToolCallHookActionTool $tool;

    /**
     * @var ?string $toolId This is the tool to call. To use a transient tool, send `tool` instead.
     */
    #[JsonProperty('toolId')]
    public ?string $toolId;

    /**
     * @param array{
     *   type: value-of<ToolCallHookActionType>,
     *   tool?: ?ToolCallHookActionTool,
     *   toolId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->tool = $values['tool'] ?? null;
        $this->toolId = $values['toolId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
