<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHookModelResponseTimeout extends JsonSerializableType
{
    /**
     * @var value-of<CallHookModelResponseTimeoutOn> $on This is the event that triggers this hook
     */
    #[JsonProperty('on')]
    public string $on;

    /**
     * @var array<CallHookModelResponseTimeoutDoItem> $do This is the set of actions to perform when the hook triggers
     */
    #[JsonProperty('do'), ArrayType([CallHookModelResponseTimeoutDoItem::class])]
    public array $do;

    /**
     * @param array{
     *   on: value-of<CallHookModelResponseTimeoutOn>,
     *   do: array<CallHookModelResponseTimeoutDoItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->on = $values['on'];
        $this->do = $values['do'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
