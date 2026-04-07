<?php

namespace Vapi\Chats\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Chats\Types\ListChatsRequestSortOrder;
use DateTime;

class ListChatsRequest extends JsonSerializableType
{
    /**
     * @var ?string $id This is the unique identifier for the chat to filter by.
     */
    public ?string $id;

    /**
     * @var ?string $assistantId This is the unique identifier for the assistant that will be used for the chat.
     */
    public ?string $assistantId;

    /**
     * @var ?string $assistantIdAny Filter by multiple assistant IDs. Provide as comma-separated values.
     */
    public ?string $assistantIdAny;

    /**
     * @var ?string $squadId This is the unique identifier for the squad that will be used for the chat.
     */
    public ?string $squadId;

    /**
     * @var ?string $sessionId This is the unique identifier for the session that will be used for the chat.
     */
    public ?string $sessionId;

    /**
     * @var ?string $previousChatId This is the unique identifier for the previous chat to filter by.
     */
    public ?string $previousChatId;

    /**
     * @var ?float $page This is the page number to return. Defaults to 1.
     */
    public ?float $page;

    /**
     * @var ?value-of<ListChatsRequestSortOrder> $sortOrder This is the sort order for pagination. Defaults to 'DESC'.
     */
    public ?string $sortOrder;

    /**
     * @var ?float $limit This is the maximum number of items to return. Defaults to 100.
     */
    public ?float $limit;

    /**
     * @var ?DateTime $createdAtGt This will return items where the createdAt is greater than the specified value.
     */
    public ?DateTime $createdAtGt;

    /**
     * @var ?DateTime $createdAtLt This will return items where the createdAt is less than the specified value.
     */
    public ?DateTime $createdAtLt;

    /**
     * @var ?DateTime $createdAtGe This will return items where the createdAt is greater than or equal to the specified value.
     */
    public ?DateTime $createdAtGe;

    /**
     * @var ?DateTime $createdAtLe This will return items where the createdAt is less than or equal to the specified value.
     */
    public ?DateTime $createdAtLe;

    /**
     * @var ?DateTime $updatedAtGt This will return items where the updatedAt is greater than the specified value.
     */
    public ?DateTime $updatedAtGt;

    /**
     * @var ?DateTime $updatedAtLt This will return items where the updatedAt is less than the specified value.
     */
    public ?DateTime $updatedAtLt;

    /**
     * @var ?DateTime $updatedAtGe This will return items where the updatedAt is greater than or equal to the specified value.
     */
    public ?DateTime $updatedAtGe;

    /**
     * @var ?DateTime $updatedAtLe This will return items where the updatedAt is less than or equal to the specified value.
     */
    public ?DateTime $updatedAtLe;

    /**
     * @param array{
     *   id?: ?string,
     *   assistantId?: ?string,
     *   assistantIdAny?: ?string,
     *   squadId?: ?string,
     *   sessionId?: ?string,
     *   previousChatId?: ?string,
     *   page?: ?float,
     *   sortOrder?: ?value-of<ListChatsRequestSortOrder>,
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
}
