<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class TransientTwilioPhoneNumber extends JsonSerializableType
{
    /**
     * This is the fallback destination an inbound call will be transferred to if:
     * 1. `assistantId` is not set
     * 2. `squadId` is not set
     * 3. and, `assistant-request` message to the `serverUrl` fails
     *
     * If this is not set and above conditions are met, the inbound call is hung up with an error message.
     *
     * @var ?TransientTwilioPhoneNumberFallbackDestination $fallbackDestination
     */
    #[JsonProperty('fallbackDestination')]
    public ?TransientTwilioPhoneNumberFallbackDestination $fallbackDestination;

    /**
     * @var ?array<TransientTwilioPhoneNumberHooksItem> $hooks This is the hooks that will be used for incoming calls to this phone number.
     */
    #[JsonProperty('hooks'), ArrayType([TransientTwilioPhoneNumberHooksItem::class])]
    public ?array $hooks;

    /**
     * Controls whether Vapi sets the messaging webhook URL on the Twilio number during import.
     *
     * If set to `false`, Vapi will not update the Twilio messaging URL, leaving it as is.
     * If `true` or omitted (default), Vapi will configure both the voice and messaging URLs.
     *
     * @default true
     *
     * @var ?bool $smsEnabled
     */
    #[JsonProperty('smsEnabled')]
    public ?bool $smsEnabled;

    /**
     * @var ?string $name This is the name of the phone number. This is just for your own reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * This is the assistant that will be used for incoming calls to this phone number.
     *
     * If neither `assistantId`, `squadId` nor `workflowId` is set, `assistant-request` will be sent to your Server URL. Check `ServerMessage` and `ServerMessageResponse` for the shape of the message and response that is expected.
     *
     * @var ?string $assistantId
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * This is the workflow that will be used for incoming calls to this phone number.
     *
     * If neither `assistantId`, `squadId`, nor `workflowId` is set, `assistant-request` will be sent to your Server URL. Check `ServerMessage` and `ServerMessageResponse` for the shape of the message and response that is expected.
     *
     * @var ?string $workflowId
     */
    #[JsonProperty('workflowId')]
    public ?string $workflowId;

    /**
     * This is the squad that will be used for incoming calls to this phone number.
     *
     * If neither `assistantId`, `squadId`, nor `workflowId` is set, `assistant-request` will be sent to your Server URL. Check `ServerMessage` and `ServerMessageResponse` for the shape of the message and response that is expected.
     *
     * @var ?string $squadId
     */
    #[JsonProperty('squadId')]
    public ?string $squadId;

    /**
     * This is where Vapi will send webhooks. You can find all webhooks available along with their shape in ServerMessage schema.
     *
     * The order of precedence is:
     *
     * 1. assistant.server
     * 2. phoneNumber.server
     * 3. org.server
     *
     * @var ?Server $server
     */
    #[JsonProperty('server')]
    public ?Server $server;

    /**
     * @var string $twilioPhoneNumber These are the digits of the phone number you own on your Twilio.
     */
    #[JsonProperty('twilioPhoneNumber')]
    public string $twilioPhoneNumber;

    /**
     * @var string $twilioAccountSid This is your Twilio Account SID that will be used to handle this phone number.
     */
    #[JsonProperty('twilioAccountSid')]
    public string $twilioAccountSid;

    /**
     * @param array{
     *   twilioPhoneNumber: string,
     *   twilioAccountSid: string,
     *   fallbackDestination?: ?TransientTwilioPhoneNumberFallbackDestination,
     *   hooks?: ?array<TransientTwilioPhoneNumberHooksItem>,
     *   smsEnabled?: ?bool,
     *   name?: ?string,
     *   assistantId?: ?string,
     *   workflowId?: ?string,
     *   squadId?: ?string,
     *   server?: ?Server,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->fallbackDestination = $values['fallbackDestination'] ?? null;
        $this->hooks = $values['hooks'] ?? null;
        $this->smsEnabled = $values['smsEnabled'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->assistantId = $values['assistantId'] ?? null;
        $this->workflowId = $values['workflowId'] ?? null;
        $this->squadId = $values['squadId'] ?? null;
        $this->server = $values['server'] ?? null;
        $this->twilioPhoneNumber = $values['twilioPhoneNumber'];
        $this->twilioAccountSid = $values['twilioAccountSid'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
