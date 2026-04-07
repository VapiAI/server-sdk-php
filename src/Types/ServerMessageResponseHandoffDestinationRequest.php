<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class ServerMessageResponseHandoffDestinationRequest extends JsonSerializableType
{
    /**
     * @var ?string $result This is the local tool result message returned for the handoff tool call.
     */
    #[JsonProperty('result')]
    public ?string $result;

    /**
     * @var array<string, mixed> $destination This is the destination you'd like the call to be transferred to.
     */
    #[JsonProperty('destination'), ArrayType(['string' => 'mixed'])]
    public array $destination;

    /**
     * @var ?string $error This is the error message if the handoff should not be made.
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @param array{
     *   destination: array<string, mixed>,
     *   result?: ?string,
     *   error?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->result = $values['result'] ?? null;
        $this->destination = $values['destination'];
        $this->error = $values['error'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
