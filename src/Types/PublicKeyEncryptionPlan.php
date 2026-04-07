<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class PublicKeyEncryptionPlan extends JsonSerializableType
{
    /**
     * @var value-of<PublicKeyEncryptionPlanAlgorithm> $algorithm The encryption algorithm to use.
     */
    #[JsonProperty('algorithm')]
    public string $algorithm;

    /**
     * @var PublicKeyEncryptionPlanPublicKey $publicKey The public key configuration.
     */
    #[JsonProperty('publicKey')]
    public PublicKeyEncryptionPlanPublicKey $publicKey;

    /**
     * @param array{
     *   algorithm: value-of<PublicKeyEncryptionPlanAlgorithm>,
     *   publicKey: PublicKeyEncryptionPlanPublicKey,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->algorithm = $values['algorithm'];
        $this->publicKey = $values['publicKey'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
