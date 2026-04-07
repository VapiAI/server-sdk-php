<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SessionCreatedHook extends JsonSerializableType
{
    /**
     * @var value-of<SessionCreatedHookOn> $on This is the event that triggers this hook
     */
    #[JsonProperty('on')]
    public string $on;

    /**
     * @var array<ToolCallHookAction> $do This is the set of actions to perform when the hook triggers.
     */
    #[JsonProperty('do'), ArrayType([ToolCallHookAction::class])]
    public array $do;

    /**
     * Optional name for this hook instance.
     * If no name is provided, the hook will be auto generated as UUID.
     *
     * @default UUID
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   on: value-of<SessionCreatedHookOn>,
     *   do: array<ToolCallHookAction>,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->on = $values['on'];
        $this->do = $values['do'];
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
