<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class KnowledgeBaseV2File extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $knowledgeBaseV2Id
     */
    #[JsonProperty('knowledgeBaseV2Id')]
    public string $knowledgeBaseV2Id;

    /**
     * @var string $fileId
     */
    #[JsonProperty('fileId')]
    public string $fileId;

    /**
     * @var ?string $fileName
     */
    #[JsonProperty('fileName')]
    public ?string $fileName;

    /**
     * @var ?string $mimetype
     */
    #[JsonProperty('mimetype')]
    public ?string $mimetype;

    /**
     * @var ?float $bytes
     */
    #[JsonProperty('bytes')]
    public ?float $bytes;

    /**
     * @var value-of<KnowledgeBaseV2FileStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   id: string,
     *   knowledgeBaseV2Id: string,
     *   fileId: string,
     *   status: value-of<KnowledgeBaseV2FileStatus>,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   fileName?: ?string,
     *   mimetype?: ?string,
     *   bytes?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->knowledgeBaseV2Id = $values['knowledgeBaseV2Id'];
        $this->fileId = $values['fileId'];
        $this->fileName = $values['fileName'] ?? null;
        $this->mimetype = $values['mimetype'] ?? null;
        $this->bytes = $values['bytes'] ?? null;
        $this->status = $values['status'];
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
