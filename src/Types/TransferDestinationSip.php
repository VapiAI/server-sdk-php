<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;
use Vapi\Core\Types\ArrayType;

class TransferDestinationSip extends JsonSerializableType
{
    /**
     * This is spoken to the customer before connecting them to the destination.
     *
     * Usage:
     * - If this is not provided and transfer tool messages is not provided, default is "Transferring the call now".
     * - If set to "", nothing is spoken. This is useful when you want to silently transfer. This is especially useful when transferring between assistants in a squad. In this scenario, you likely also want to set `assistant.firstMessageMode=assistant-speaks-first-with-model-generated-message` for the destination assistant.
     *
     * This accepts a string or a ToolMessageStart class. Latter is useful if you want to specify multiple messages for different languages through the `contents` field.
     *
     * @var (
     *    string
     *   |CustomMessage
     * )|null $message
     */
    #[JsonProperty('message'), Union('string', CustomMessage::class, 'null')]
    public string|CustomMessage|null $message;

    /**
     * @var string $sipUri This is the SIP URI to transfer the call to.
     */
    #[JsonProperty('sipUri')]
    public string $sipUri;

    /**
     * This is the caller ID to use when transferring the call to the `sipUri`.
     *
     * Usage:
     * - If not provided, the caller ID will be determined by the SIP infrastructure.
     * - Set to '{{customer.number}}' to always use the customer's number as the caller ID.
     * - Set to '{{phoneNumber.number}}' to always use the phone number of the assistant as the caller ID.
     * - Set to any E164 number to always use that number as the caller ID.
     *
     * Only applicable when `transferPlan.sipVerb='dial'`. Not applicable for SIP REFER.
     *
     * @var ?string $callerId
     */
    #[JsonProperty('callerId')]
    public ?string $callerId;

    /**
     * This configures how transfer is executed and the experience of the destination party receiving the call. Defaults to `blind-transfer`.
     *
     * @default `transferPlan.mode='blind-transfer'`
     *
     * @var ?TransferPlan $transferPlan
     */
    #[JsonProperty('transferPlan')]
    public ?TransferPlan $transferPlan;

    /**
     * @var ?array<string, mixed> $sipHeaders These are custom headers to be added to SIP refer during transfer call.
     */
    #[JsonProperty('sipHeaders'), ArrayType(['string' => 'mixed'])]
    public ?array $sipHeaders;

    /**
     * @var ?string $description This is the description of the destination, used by the AI to choose when and how to transfer the call.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @param array{
     *   sipUri: string,
     *   message?: (
     *    string
     *   |CustomMessage
     * )|null,
     *   callerId?: ?string,
     *   transferPlan?: ?TransferPlan,
     *   sipHeaders?: ?array<string, mixed>,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'] ?? null;
        $this->sipUri = $values['sipUri'];
        $this->callerId = $values['callerId'] ?? null;
        $this->transferPlan = $values['transferPlan'] ?? null;
        $this->sipHeaders = $values['sipHeaders'] ?? null;
        $this->description = $values['description'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
