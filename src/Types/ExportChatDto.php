<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class ExportChatDto extends JsonSerializableType
{
    /**
     * @var ?string $id This is the unique identifier for the chat to filter by.
     */
    #[JsonProperty('id')]
    public ?string $id;

    /**
     * @var ?string $assistantId This is the unique identifier for the assistant that will be used for the chat.
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @var ?string $assistantIdAny Filter by multiple assistant IDs. Provide as comma-separated values.
     */
    #[JsonProperty('assistantIdAny')]
    public ?string $assistantIdAny;

    /**
     * @var ?string $squadId This is the unique identifier for the squad that will be used for the chat.
     */
    #[JsonProperty('squadId')]
    public ?string $squadId;

    /**
     * @var ?string $sessionId This is the unique identifier for the session that will be used for the chat.
     */
    #[JsonProperty('sessionId')]
    public ?string $sessionId;

    /**
     * @var ?string $previousChatId This is the unique identifier for the previous chat to filter by.
     */
    #[JsonProperty('previousChatId')]
    public ?string $previousChatId;

    /**
     * @var ?value-of<ExportChatDtoColumns> $columns Columns to include in the CSV export
     */
    #[JsonProperty('columns')]
    public ?string $columns;

    /**
     * This is the email address to send the export to.
     * Required if userId is not available in the request context.
     *
     * @var ?string $email
     */
    #[JsonProperty('email')]
    public ?string $email;

    /**
     * This is the format of the export.
     *
     * @default csv
     *
     * @var ?value-of<ExportChatDtoFormat> $format
     */
    #[JsonProperty('format')]
    public ?string $format;

    /**
     * @var ?float $page This is the page number to return. Defaults to 1.
     */
    #[JsonProperty('page')]
    public ?float $page;

    /**
     * @var ?value-of<ExportChatDtoSortOrder> $sortOrder This is the sort order for pagination. Defaults to 'DESC'.
     */
    #[JsonProperty('sortOrder')]
    public ?string $sortOrder;

    /**
     * @var ?float $limit This is the maximum number of items to return. Defaults to 100.
     */
    #[JsonProperty('limit')]
    public ?float $limit;

    /**
     * @var ?DateTime $createdAtGt This will return items where the createdAt is greater than the specified value.
     */
    #[JsonProperty('createdAtGt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAtGt;

    /**
     * @var ?DateTime $createdAtLt This will return items where the createdAt is less than the specified value.
     */
    #[JsonProperty('createdAtLt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAtLt;

    /**
     * @var ?DateTime $createdAtGe This will return items where the createdAt is greater than or equal to the specified value.
     */
    #[JsonProperty('createdAtGe'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAtGe;

    /**
     * @var ?DateTime $createdAtLe This will return items where the createdAt is less than or equal to the specified value.
     */
    #[JsonProperty('createdAtLe'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAtLe;

    /**
     * @var ?DateTime $updatedAtGt This will return items where the updatedAt is greater than the specified value.
     */
    #[JsonProperty('updatedAtGt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAtGt;

    /**
     * @var ?DateTime $updatedAtLt This will return items where the updatedAt is less than the specified value.
     */
    #[JsonProperty('updatedAtLt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAtLt;

    /**
     * @var ?DateTime $updatedAtGe This will return items where the updatedAt is greater than or equal to the specified value.
     */
    #[JsonProperty('updatedAtGe'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAtGe;

    /**
     * @var ?DateTime $updatedAtLe This will return items where the updatedAt is less than or equal to the specified value.
     */
    #[JsonProperty('updatedAtLe'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAtLe;

    /**
     * @param array{
     *   id?: ?string,
     *   assistantId?: ?string,
     *   assistantIdAny?: ?string,
     *   squadId?: ?string,
     *   sessionId?: ?string,
     *   previousChatId?: ?string,
     *   columns?: ?value-of<ExportChatDtoColumns>,
     *   email?: ?string,
     *   format?: ?value-of<ExportChatDtoFormat>,
     *   page?: ?float,
     *   sortOrder?: ?value-of<ExportChatDtoSortOrder>,
     *   limit?: ?float,
     *   createdAtGt?: ?DateTime,
     *   createdAtLt?: ?DateTime,
     *   createdAtGe?: ?DateTime,
     *   createdAtLe?: ?DateTime,
     *   updatedAtGt?: ?DateTime,
     *   updatedAtLt?: ?DateTime,
     *   updatedAtGe?: ?DateTime,
     *   updatedAtLe?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->assistantId = $values['assistantId'] ?? null;
        $this->assistantIdAny = $values['assistantIdAny'] ?? null;
        $this->squadId = $values['squadId'] ?? null;
        $this->sessionId = $values['sessionId'] ?? null;
        $this->previousChatId = $values['previousChatId'] ?? null;
        $this->columns = $values['columns'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->format = $values['format'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->createdAtGt = $values['createdAtGt'] ?? null;
        $this->createdAtLt = $values['createdAtLt'] ?? null;
        $this->createdAtGe = $values['createdAtGe'] ?? null;
        $this->createdAtLe = $values['createdAtLe'] ?? null;
        $this->updatedAtGt = $values['updatedAtGt'] ?? null;
        $this->updatedAtLt = $values['updatedAtLt'] ?? null;
        $this->updatedAtGe = $values['updatedAtGe'] ?? null;
        $this->updatedAtLe = $values['updatedAtLe'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
