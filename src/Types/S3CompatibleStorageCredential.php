<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class S3CompatibleStorageCredential extends JsonSerializableType
{
    /**
     * @var value-of<S3CompatibleStorageCredentialProvider> $provider This is for S3-compatible storage such as MinIO, Garage, Ceph, or Backblaze B2.
     */
    #[JsonProperty('provider')]
    public string $provider;

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
     * @var string $id This is the unique identifier for the credential.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that this credential belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the credential was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the assistant was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   provider: value-of<S3CompatibleStorageCredentialProvider>,
     *   bucketPlan: S3CompatibleBucketPlan,
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   fallbackIndex?: ?float,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->provider = $values['provider'];
        $this->bucketPlan = $values['bucketPlan'];
        $this->fallbackIndex = $values['fallbackIndex'] ?? null;
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
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
