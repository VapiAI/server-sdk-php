<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SipTrunkOutboundAuthenticationPlan extends JsonSerializableType
{
    /**
     * @var ?string $authPassword This is not returned in the API.
     */
    #[JsonProperty('authPassword')]
    public ?string $authPassword;

    /**
     * @var ?string $authUsername
     */
    #[JsonProperty('authUsername')]
    public ?string $authUsername;

    /**
     * @var ?SipTrunkOutboundSipRegisterPlan $sipRegisterPlan This can be used to configure if SIP register is required by the SIP trunk. If not provided, no SIP registration will be attempted.
     */
    #[JsonProperty('sipRegisterPlan')]
    public ?SipTrunkOutboundSipRegisterPlan $sipRegisterPlan;

    /**
     * @param array{
     *   authPassword?: ?string,
     *   authUsername?: ?string,
     *   sipRegisterPlan?: ?SipTrunkOutboundSipRegisterPlan,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->authPassword = $values['authPassword'] ?? null;
        $this->authUsername = $values['authUsername'] ?? null;
        $this->sipRegisterPlan = $values['sipRegisterPlan'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
