<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class S3CompatibleBucketPlan extends JsonSerializableType
{
    /**
     * @var string $url S3-compatible endpoint URL, such as https://s3.us-west-004.backblazeb2.com. Must be public HTTPS.
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var string $region SigV4 signing region expected by the object store. Most stores accept us-east-1.
     */
    #[JsonProperty('region')]
    public string $region;

    /**
     * @var string $accessKeyId S3 access key ID.
     */
    #[JsonProperty('accessKeyId')]
    public string $accessKeyId;

    /**
     * @var string $secretAccessKey S3 secret access key. This is not returned in the API.
     */
    #[JsonProperty('secretAccessKey')]
    public string $secretAccessKey;

    /**
     * @var string $name Bucket name.
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var ?string $path Optional key prefix inside the bucket, such as recordings/.
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @param array{
     *   url: string,
     *   region: string,
     *   accessKeyId: string,
     *   secretAccessKey: string,
     *   name: string,
     *   path?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->region = $values['region'];
        $this->accessKeyId = $values['accessKeyId'];
        $this->secretAccessKey = $values['secretAccessKey'];
        $this->name = $values['name'];
        $this->path = $values['path'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
