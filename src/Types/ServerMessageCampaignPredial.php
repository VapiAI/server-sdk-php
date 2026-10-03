<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ServerMessageCampaignPredial extends JsonSerializableType
{
    /**
     * @var ?ServerMessageCampaignPredialPhoneNumber $phoneNumber This is the phone number that the message is associated with.
     */
    #[JsonProperty('phoneNumber')]
    public ?ServerMessageCampaignPredialPhoneNumber $phoneNumber;

    /**
     * This is the version label (e.g. `v3`) of the assistant the call was
     * configured with. `null` for inline assistants, squad/workflow calls,
     * pre-resolution assistant-request messages, and orgs not on
     * assistant versioning.
     *
     * @var ?string $assistantVersion
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

    /**
     * @var value-of<ServerMessageCampaignPredialType> $type This is the type of the message. "campaign.predial" is sent to the campaign's server before each contact is dialed, so the server can decide whether the contact is eligible to be called. It is only sent when the campaign's `predialPlan` is set (and not disabled).
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $campaignId This is the ID of the campaign the contact belongs to.
     */
    #[JsonProperty('campaignId')]
    public string $campaignId;

    /**
     * @var CampaignContact $contact This is the contact that is about to be dialed.
     */
    #[JsonProperty('contact')]
    public CampaignContact $contact;

    /**
     * @var ?float $timestamp This is the timestamp of the message.
     */
    #[JsonProperty('timestamp')]
    public ?float $timestamp;

    /**
     * This is a live version of the `call.artifact`.
     *
     * This matches what is stored on `call.artifact` after the call.
     *
     * @var ?Artifact $artifact
     */
    #[JsonProperty('artifact')]
    public ?Artifact $artifact;

    /**
     * @var ?CreateAssistantDto $assistant This is the assistant that the message is associated with.
     */
    #[JsonProperty('assistant')]
    public ?CreateAssistantDto $assistant;

    /**
     * @var ?CreateCustomerDto $customer This is the customer that the message is associated with.
     */
    #[JsonProperty('customer')]
    public ?CreateCustomerDto $customer;

    /**
     * @var ?Call $call This is the call that the message is associated with.
     */
    #[JsonProperty('call')]
    public ?Call $call;

    /**
     * @var ?Chat $chat This is the chat object.
     */
    #[JsonProperty('chat')]
    public ?Chat $chat;

    /**
     * @param array{
     *   type: value-of<ServerMessageCampaignPredialType>,
     *   campaignId: string,
     *   contact: CampaignContact,
     *   phoneNumber?: ?ServerMessageCampaignPredialPhoneNumber,
     *   assistantVersion?: ?string,
     *   timestamp?: ?float,
     *   artifact?: ?Artifact,
     *   assistant?: ?CreateAssistantDto,
     *   customer?: ?CreateCustomerDto,
     *   call?: ?Call,
     *   chat?: ?Chat,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->assistantVersion = $values['assistantVersion'] ?? null;
        $this->type = $values['type'];
        $this->campaignId = $values['campaignId'];
        $this->contact = $values['contact'];
        $this->timestamp = $values['timestamp'] ?? null;
        $this->artifact = $values['artifact'] ?? null;
        $this->assistant = $values['assistant'] ?? null;
        $this->customer = $values['customer'] ?? null;
        $this->call = $values['call'] ?? null;
        $this->chat = $values['chat'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
