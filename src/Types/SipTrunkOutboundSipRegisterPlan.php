<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Registration settings used when the SIP trunk requires SIP REGISTER.
 */
class SipTrunkOutboundSipRegisterPlan extends JsonSerializableType
{
    /**
     * @var ?string $domain SIP registrar domain used for registration.
     */
    #[JsonProperty('domain')]
    public ?string $domain;

    /**
     * @var ?string $username Username sent with the SIP REGISTER request.
     */
    #[JsonProperty('username')]
    public ?string $username;

    /**
     * @var ?string $realm Authentication realm used for SIP registration.
     */
    #[JsonProperty('realm')]
    public ?string $realm;

    /**
     * @param array{
     *   domain?: ?string,
     *   username?: ?string,
     *   realm?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->domain = $values['domain'] ?? null;
        $this->username = $values['username'] ?? null;
        $this->realm = $values['realm'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
