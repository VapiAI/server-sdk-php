<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Credentials for storing call artifacts in Supabase's S3-compatible storage, including bucket configuration and upload fallback order.
 */
class CreateSupabaseCredentialDto extends JsonSerializableType
{
    /**
     * @var ?float $fallbackIndex This is the order in which this storage provider is tried during upload retries. Lower numbers are tried first in increasing order.
     */
    #[JsonProperty('fallbackIndex')]
    public ?float $fallbackIndex;

    /**
     * @var ?SupabaseBucketPlan $bucketPlan Supabase S3-compatible bucket configuration used to store call artifacts.
     */
    #[JsonProperty('bucketPlan')]
    public ?SupabaseBucketPlan $bucketPlan;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   fallbackIndex?: ?float,
     *   bucketPlan?: ?SupabaseBucketPlan,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
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
