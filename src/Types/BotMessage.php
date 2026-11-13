<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * An assistant-authored entry in the call message history, including content, timing, source, and duration.
 */
class BotMessage extends JsonSerializableType
{
    /**
     * @var string $role The role of the bot in the conversation.
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @var string $message The message content from the bot.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var float $time The timestamp when the message was sent.
     */
    #[JsonProperty('time')]
    public float $time;

    /**
     * @var float $endTime The timestamp when the message ended.
     */
    #[JsonProperty('endTime')]
    public float $endTime;

    /**
     * @var float $secondsFromStart The number of seconds from the start of the conversation.
     */
    #[JsonProperty('secondsFromStart')]
    public float $secondsFromStart;

    /**
     * @var ?string $source The source of the message.
     */
    #[JsonProperty('source')]
    public ?string $source;

    /**
     * @var ?float $duration The duration of the message in seconds.
     */
    #[JsonProperty('duration')]
    public ?float $duration;

    /**
     * The name of the assistant that produced this message. In a squad or
     * handoff call this is the specific sub-agent active when the message was
     * spoken, letting the transcript label each message by speaker.
     *
     * @var ?string $assistantName
     */
    #[JsonProperty('assistantName')]
    public ?string $assistantName;

    /**
     * The ID of the assistant that produced this message. Stable reference for
     * the assistant named in `assistantName`.
     *
     * @var ?string $assistantId
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @param array{
     *   role: string,
     *   message: string,
     *   time: float,
     *   endTime: float,
     *   secondsFromStart: float,
     *   source?: ?string,
     *   duration?: ?float,
     *   assistantName?: ?string,
     *   assistantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->role = $values['role'];
        $this->message = $values['message'];
        $this->time = $values['time'];
        $this->endTime = $values['endTime'];
        $this->secondsFromStart = $values['secondsFromStart'];
        $this->source = $values['source'] ?? null;
        $this->duration = $values['duration'] ?? null;
        $this->assistantName = $values['assistantName'] ?? null;
        $this->assistantId = $values['assistantId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
