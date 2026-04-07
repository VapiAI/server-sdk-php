<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class RelayRequest extends JsonSerializableType
{
    /**
     * @var string $source The source identifier of the relay request
     */
    #[JsonProperty('source')]
    public string $source;

    /**
     * @var RelayRequestTarget $target The target assistant or squad to relay the commands to
     */
    #[JsonProperty('target')]
    public RelayRequestTarget $target;

    /**
     * @var string $customerId The unique identifier of the customer
     */
    #[JsonProperty('customerId')]
    public string $customerId;

    /**
     * @var array<RelayRequestCommandsItem> $commands The list of commands to relay to the target
     */
    #[JsonProperty('commands'), ArrayType([RelayRequestCommandsItem::class])]
    public array $commands;

    /**
     * @param array{
     *   source: string,
     *   target: RelayRequestTarget,
     *   customerId: string,
     *   commands: array<RelayRequestCommandsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->source = $values['source'];
        $this->target = $values['target'];
        $this->customerId = $values['customerId'];
        $this->commands = $values['commands'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
