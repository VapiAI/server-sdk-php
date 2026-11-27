<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CreateS3CompatibleCredentialDto extends JsonSerializableType
{
    /**
     * @var S3CompatibleBucketPlan $bucketPlan
     */
    #[JsonProperty('bucketPlan')]
    public S3CompatibleBucketPlan $bucketPlan;

    /**
     * @var ?float $fallbackIndex This is the order in which this storage provider is tried during upload retries. Lower numbers are tried first in increasing order.
     */
    #[JsonProperty('fallbackIndex')]
    public ?float $fallbackIndex;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   bucketPlan: S3CompatibleBucketPlan,
     *   fallbackIndex?: ?float,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->bucketPlan = $values['bucketPlan'];
        $this->fallbackIndex = $values['fallbackIndex'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
