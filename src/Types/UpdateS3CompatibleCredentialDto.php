<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateS3CompatibleCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateS3CompatibleCredentialDtoProvider> $provider This is for S3-compatible storage such as MinIO, Garage, Ceph, or Backblaze B2.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?float $fallbackIndex This is the order in which this storage provider is tried during upload retries. Lower numbers are tried first in increasing order.
     */
    #[JsonProperty('fallbackIndex')]
    public ?float $fallbackIndex;

    /**
     * @var ?UpdateS3CompatibleBucketPlanDto $bucketPlan
     */
    #[JsonProperty('bucketPlan')]
    public ?UpdateS3CompatibleBucketPlanDto $bucketPlan;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   provider?: ?value-of<UpdateS3CompatibleCredentialDtoProvider>,
     *   fallbackIndex?: ?float,
     *   bucketPlan?: ?UpdateS3CompatibleBucketPlanDto,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->fallbackIndex = $values['fallbackIndex'] ?? null;
        $this->bucketPlan = $values['bucketPlan'] ?? null;
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
