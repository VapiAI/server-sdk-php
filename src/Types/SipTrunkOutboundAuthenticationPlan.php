<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Credentials and optional SIP REGISTER settings used to authenticate outbound calls with a SIP trunk.
 */
class SipTrunkOutboundAuthenticationPlan extends JsonSerializableType
{
    /**
     * @var ?string $authPassword This is not returned in the API.
     */
    #[JsonProperty('authPassword')]
    public ?string $authPassword;

    /**
     * @var ?SipTrunkOutboundSipRegisterPlan $sipRegisterPlan This can be used to configure if SIP register is required by the SIP trunk. On creation, omission disables registration. On update, omission preserves it; null disables it.
     */
    #[JsonProperty('sipRegisterPlan')]
    public ?SipTrunkOutboundSipRegisterPlan $sipRegisterPlan;

    /**
     * @var ?string $authUsername Username used to authenticate outbound SIP requests.
     */
    #[JsonProperty('authUsername')]
    public ?string $authUsername;

    /**
     * @param array{
     *   authPassword?: ?string,
     *   sipRegisterPlan?: ?SipTrunkOutboundSipRegisterPlan,
     *   authUsername?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authPassword = $values['authPassword'] ?? null;
        $this->sipRegisterPlan = $values['sipRegisterPlan'] ?? null;
        $this->authUsername = $values['authUsername'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
