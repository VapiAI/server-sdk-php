<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CredentialSessionResponse extends JsonSerializableType
{
    /**
     * @var string $sessionToken
     */
    #[JsonProperty('sessionToken')]
    public string $sessionToken;

    /**
     * @param array{
     *   sessionToken: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sessionToken = $values['sessionToken'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
