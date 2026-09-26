<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class UpdateByoSipTrunkCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateByoSipTrunkCredentialDtoProvider> $provider This can be used to bring your own SIP trunks or to connect to a Carrier.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?array<SipTrunkGateway> $gateways This is the list of SIP trunk's gateways.
     */
    #[JsonProperty('gateways'), ArrayType([SipTrunkGateway::class])]
    public ?array $gateways;

    /**
     * @var ?SipTrunkOutboundAuthenticationPlan $outboundAuthenticationPlan This can be used to configure the outbound authentication if required by the SIP trunk.
     */
    #[JsonProperty('outboundAuthenticationPlan')]
    public ?SipTrunkOutboundAuthenticationPlan $outboundAuthenticationPlan;

    /**
     * This ensures the outbound origination attempts have a leading plus. Defaults to false to match conventional telecom behavior.
     *
     * Usage:
     * - Vonage/Twilio requires leading plus for all outbound calls. Set this to true.
     *
     * @default false
     *
     * @var ?bool $outboundLeadingPlusEnabled
     */
    #[JsonProperty('outboundLeadingPlusEnabled')]
    public ?bool $outboundLeadingPlusEnabled;

    /**
     * @var ?string $techPrefix This can be used to configure the tech prefix on outbound calls. This is an advanced property.
     */
    #[JsonProperty('techPrefix')]
    public ?string $techPrefix;

    /**
     * @var ?string $sipDiversionHeader This can be used to enable the SIP diversion header for authenticating the calling number if the SIP trunk supports it. This is an advanced property.
     */
    #[JsonProperty('sipDiversionHeader')]
    public ?string $sipDiversionHeader;

    /**
     * @param array{
     *   provider?: ?value-of<UpdateByoSipTrunkCredentialDtoProvider>,
     *   name?: ?string,
     *   gateways?: ?array<SipTrunkGateway>,
     *   outboundAuthenticationPlan?: ?SipTrunkOutboundAuthenticationPlan,
     *   outboundLeadingPlusEnabled?: ?bool,
     *   techPrefix?: ?string,
     *   sipDiversionHeader?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->gateways = $values['gateways'] ?? null;
        $this->outboundAuthenticationPlan = $values['outboundAuthenticationPlan'] ?? null;
        $this->outboundLeadingPlusEnabled = $values['outboundLeadingPlusEnabled'] ?? null;
        $this->techPrefix = $values['techPrefix'] ?? null;
        $this->sipDiversionHeader = $values['sipDiversionHeader'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
