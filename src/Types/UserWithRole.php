<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class UserWithRole extends JsonSerializableType
{
    /**
     * @var (
     *    value-of<UserWithRoleRoleZero>
     *   |string
     * ) $role This is the user's role in the org: a built-in role, the HIPAA special role, or a custom WorkOS role slug prefixed with `org-`.
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @var ?DateTime $lastActiveAt This is the ISO 8601 date-time string of the user's most recent sign-in to the org's identity provider (WorkOS). It is a property of the user, not of this org membership, so a sign-in to another WorkOS org counts. Only returned to org admins; absent when the requester is not an admin, no sign-in has been recorded, or the org is not linked to WorkOS.
     */
    #[JsonProperty('lastActiveAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $lastActiveAt;

    /**
     * @var string $id This is the unique identifier for the profile or user.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the profile was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the profile was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @var string $email This is the email of the user that is associated with the profile.
     */
    #[JsonProperty('email')]
    public string $email;

    /**
     * @var ?string $fullName This is the full name of the user that is associated with the profile.
     */
    #[JsonProperty('fullName')]
    public ?string $fullName;

    /**
     * @param array{
     *   role: (
     *    value-of<UserWithRoleRoleZero>
     *   |string
     * ),
     *   id: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   email: string,
     *   lastActiveAt?: ?DateTime,
     *   fullName?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->role = $values['role'];
        $this->lastActiveAt = $values['lastActiveAt'] ?? null;
        $this->id = $values['id'];
        $this->createdAt = $values['createdAt'];
        $this->updatedAt = $values['updatedAt'];
        $this->email = $values['email'];
        $this->fullName = $values['fullName'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
