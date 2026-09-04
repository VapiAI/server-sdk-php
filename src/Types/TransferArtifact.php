<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use Vapi\Core\Types\Union;

class TransferArtifact extends JsonSerializableType
{
    /**
     * @var TransferArtifactDestination $destination The transfer destination (phone number or SIP URI).
     */
    #[JsonProperty('destination')]
    public TransferArtifactDestination $destination;

    /**
     * @var ?value-of<TransferArtifactMode> $mode The transfer mode (e.g. warm-transfer-experimental, blind-transfer).
     */
    #[JsonProperty('mode')]
    public ?string $mode;

    /**
     * @var ?string $transcript Flat-text transcript / announcement preview of the transfer.
     */
    #[JsonProperty('transcript')]
    public ?string $transcript;

    /**
     * @var ?value-of<TransferArtifactStatus> $status The terminal status of the transfer, rendered as the status line.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * The agent↔operator conversation captured during a
     * warm-transfer-experimental, rendered as bubbles.
     *
     * @var ?array<(
     *    UserMessage
     *   |SystemMessage
     *   |BotMessage
     *   |ToolCallMessage
     *   |ToolCallResultMessage
     * )> $messages
     */
    #[JsonProperty('messages'), ArrayType([new Union(UserMessage::class, SystemMessage::class, BotMessage::class, ToolCallMessage::class, ToolCallResultMessage::class)])]
    public ?array $messages;

    /**
     * @param array{
     *   destination: TransferArtifactDestination,
     *   mode?: ?value-of<TransferArtifactMode>,
     *   transcript?: ?string,
     *   status?: ?value-of<TransferArtifactStatus>,
     *   messages?: ?array<(
     *    UserMessage
     *   |SystemMessage
     *   |BotMessage
     *   |ToolCallMessage
     *   |ToolCallResultMessage
     * )>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->destination = $values['destination'];
        $this->mode = $values['mode'] ?? null;
        $this->transcript = $values['transcript'] ?? null;
        $this->status = $values['status'] ?? null;
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
