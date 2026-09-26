<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use DateTime;
use Vapi\Core\Types\Date;

/**
 * An uploaded file record, including its processing status, storage details, extracted-text location, metadata, and lifecycle timestamps.
 */
class File extends JsonSerializableType
{
    /**
     * @var ?value-of<FileObject> $object The object type. This is always `file`.
     */
    #[JsonProperty('object')]
    public ?string $object;

    /**
     * @var ?value-of<FileStatus> $status The current processing status of the uploaded file.
     */
    #[JsonProperty('status')]
    public ?string $status;

    /**
     * @var ?string $name This is the name of the file. This is just for your own reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $originalName The original name of the uploaded file.
     */
    #[JsonProperty('originalName')]
    public ?string $originalName;

    /**
     * @var ?float $bytes The size of the uploaded file in bytes.
     */
    #[JsonProperty('bytes')]
    public ?float $bytes;

    /**
     * @var ?string $purpose The intended use assigned to the uploaded file.
     */
    #[JsonProperty('purpose')]
    public ?string $purpose;

    /**
     * @var ?string $mimetype The MIME type of the uploaded file.
     */
    #[JsonProperty('mimetype')]
    public ?string $mimetype;

    /**
     * @var ?string $key The object-storage key for the uploaded file.
     */
    #[JsonProperty('key')]
    public ?string $key;

    /**
     * @var ?string $path The object-storage path for the uploaded file.
     */
    #[JsonProperty('path')]
    public ?string $path;

    /**
     * @var ?string $bucket The object-storage bucket containing the uploaded file.
     */
    #[JsonProperty('bucket')]
    public ?string $bucket;

    /**
     * @var ?string $url The URL used to access the uploaded file.
     */
    #[JsonProperty('url')]
    public ?string $url;

    /**
     * @var ?string $parsedTextUrl The URL used to access text extracted from the file.
     */
    #[JsonProperty('parsedTextUrl')]
    public ?string $parsedTextUrl;

    /**
     * @var ?float $parsedTextBytes The size of the extracted text in bytes.
     */
    #[JsonProperty('parsedTextBytes')]
    public ?float $parsedTextBytes;

    /**
     * @var ?array<string, mixed> $metadata Additional metadata associated with the uploaded file.
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @var string $id This is the unique identifier for the file.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that this file belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the file was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the file was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   object?: ?value-of<FileObject>,
     *   status?: ?value-of<FileStatus>,
     *   name?: ?string,
     *   originalName?: ?string,
     *   bytes?: ?float,
     *   purpose?: ?string,
     *   mimetype?: ?string,
     *   key?: ?string,
     *   path?: ?string,
     *   bucket?: ?string,
     *   url?: ?string,
     *   parsedTextUrl?: ?string,
     *   parsedTextBytes?: ?float,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->object = $values['object'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->originalName = $values['originalName'] ?? null;
        $this->bytes = $values['bytes'] ?? null;
        $this->purpose = $values['purpose'] ?? null;
        $this->mimetype = $values['mimetype'] ?? null;
        $this->key = $values['key'] ?? null;
        $this->path = $values['path'] ?? null;
        $this->bucket = $values['bucket'] ?? null;
        $this->url = $values['url'] ?? null;
        $this->parsedTextUrl = $values['parsedTextUrl'] ?? null;
        $this->parsedTextBytes = $values['parsedTextBytes'] ?? null;
        $this->metadata = $values['metadata'] ?? null;
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
