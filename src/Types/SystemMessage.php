<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SystemMessage extends JsonSerializableType
{
    /**
     * @var string $role The role of the system in the conversation.
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @var string $message The message content from the system.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var float $time The timestamp when the message was sent.
     */
    #[JsonProperty('time')]
    public float $time;

    /**
     * @var float $secondsFromStart The number of seconds from the start of the conversation.
     */
    #[JsonProperty('secondsFromStart')]
    public float $secondsFromStart;

    /**
     * @param array{
     *   role: string,
     *   message: string,
     *   time: float,
     *   secondsFromStart: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->role = $values['role'];
        $this->message = $values['message'];
        $this->time = $values['time'];
        $this->secondsFromStart = $values['secondsFromStart'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
