<?php

namespace Vapi\Sessions\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Sessions\Types\ListSessionsRequestSortOrder;
use DateTime;

class ListSessionsRequest extends JsonSerializableType
{
    /**
     * @var ?string $id This is the unique identifier for the session to filter by.
     */
    public ?string $id;

    /**
     * This is the name of the customer. This is just for your own reference.
     *
     * For SIP inbound calls, this is extracted from the `From` SIP header with format `"Display Name" <sip:username@domain>`.
     *
     * @var ?string $name
     */
    public ?string $name;

    /**
     * @var ?string $assistantId This is the ID of the assistant to filter sessions by.
     */
    public ?string $assistantId;

    /**
     * @var ?string $assistantIdAny Filter by multiple assistant IDs. Provide as comma-separated values.
     */
    public ?string $assistantIdAny;

    /**
     * @var ?string $squadId This is the ID of the squad to filter sessions by.
     */
    public ?string $squadId;

    /**
     * @var ?string $workflowId This is the ID of the workflow to filter sessions by.
     */
    public ?string $workflowId;

    /**
     * This is the flag to toggle the E164 check for the `number` field. This is an advanced property which should be used if you know your use case requires it.
     *
     * Use cases:
     * - `false`: To allow non-E164 numbers like `+001234567890`, `1234`, or `abc`. This is useful for dialing out to non-E164 numbers on your SIP trunks.
     * - `true` (default): To allow only E164 numbers like `+14155551234`. This is standard for PSTN calls.
     *
     * If `false`, the `number` is still required to only contain alphanumeric characters (regex: `/^\+?[a-zA-Z0-9]+$/`).
     *
     * @default true (E164 check is enabled)
     *
     * @var ?bool $numberE164CheckEnabled
     */
    public ?bool $numberE164CheckEnabled;

    /**
     * @var ?string $extension This is the extension that will be dialed after the call is answered.
     */
    public ?string $extension;

    /**
     * These are the overrides for the assistant's settings and template variables specific to this customer.
     * This allows customization of the assistant's behavior for individual customers in batch calls.
     *
     * @var ?string $assistantOverrides
     */
    public ?string $assistantOverrides;

    /**
     * @var ?string $number This is the number of the customer.
     */
    public ?string $number;

    /**
     * @var ?string $sipUri This is the SIP URI of the customer.
     */
    public ?string $sipUri;

    /**
     * @var ?string $email This is the email of the customer.
     */
    public ?string $email;

    /**
     * @var ?string $externalId This is the external ID of the customer.
     */
    public ?string $externalId;

    /**
     * @var ?string $customerNumberAny Filter by any of the specified customer phone numbers (comma-separated).
     */
    public ?string $customerNumberAny;

    /**
     * @var ?string $phoneNumberId This will return sessions with the specified phoneNumberId.
     */
    public ?string $phoneNumberId;

    /**
     * @var ?array<string> $phoneNumberIdAny This will return sessions with any of the specified phoneNumberIds.
     */
    public ?array $phoneNumberIdAny;

    /**
     * @var ?float $page This is the page number to return. Defaults to 1.
     */
    public ?float $page;

    /**
     * @var ?value-of<ListSessionsRequestSortOrder> $sortOrder This is the sort order for pagination. Defaults to 'DESC'.
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
     *   name?: ?string,
     *   assistantId?: ?string,
     *   assistantIdAny?: ?string,
     *   squadId?: ?string,
     *   workflowId?: ?string,
     *   numberE164CheckEnabled?: ?bool,
     *   extension?: ?string,
     *   assistantOverrides?: ?string,
     *   number?: ?string,
     *   sipUri?: ?string,
     *   email?: ?string,
     *   externalId?: ?string,
     *   customerNumberAny?: ?string,
     *   phoneNumberId?: ?string,
     *   phoneNumberIdAny?: ?array<string>,
     *   page?: ?float,
     *   sortOrder?: ?value-of<ListSessionsRequestSortOrder>,
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
        $this->name = $values['name'] ?? null;
        $this->assistantId = $values['assistantId'] ?? null;
        $this->assistantIdAny = $values['assistantIdAny'] ?? null;
        $this->squadId = $values['squadId'] ?? null;
        $this->workflowId = $values['workflowId'] ?? null;
        $this->numberE164CheckEnabled = $values['numberE164CheckEnabled'] ?? null;
        $this->extension = $values['extension'] ?? null;
        $this->assistantOverrides = $values['assistantOverrides'] ?? null;
        $this->number = $values['number'] ?? null;
        $this->sipUri = $values['sipUri'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->externalId = $values['externalId'] ?? null;
        $this->customerNumberAny = $values['customerNumberAny'] ?? null;
        $this->phoneNumberId = $values['phoneNumberId'] ?? null;
        $this->phoneNumberIdAny = $values['phoneNumberIdAny'] ?? null;
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
