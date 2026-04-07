<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SpkiPemPublicKeyConfig extends JsonSerializableType
{
    /**
     * @var ?string $name Optional name of the key for identification purposes.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var string $pem The PEM-encoded public key.
     */
    #[JsonProperty('pem')]
    public string $pem;

    /**
     * @param array{
     *   pem: string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->pem = $values['pem'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
