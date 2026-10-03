<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Credentials for authenticating knowledge-base requests with Trieve.
 */
class CreateTrieveCredentialDto extends JsonSerializableType
{
    /**
     * @var mixed $provider Selects Trieve as the credential provider.
     */
    #[JsonProperty('provider')]
    public mixed $provider;

    /**
     * @param array{
     *   provider?: mixed,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
