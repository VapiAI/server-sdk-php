<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;
use Vapi\Core\Types\ArrayType;

class SquadVersion extends JsonSerializableType
{
    /**
     * @var ?string $versionName Optional human-readable label for this version. Set when the version is published.
     */
    #[JsonProperty('versionName')]
    public ?string $versionName;

    /**
     * @var ?string $versionDescription Optional description for this version. Set when the version is published.
     */
    #[JsonProperty('versionDescription')]
    public ?string $versionDescription;

    /**
     * @var string $id This is the unique identifier for the version row.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that owns this version.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var string $squadId This is the unique identifier for the squad this version was snapshotted from.
     */
    #[JsonProperty('squadId')]
    public string $squadId;

    /**
     * This is the public monotonic version label, e.g. "v1".
     * System-owned and incremented per squad; never user-supplied.
     *
     * @var string $version
     */
    #[JsonProperty('version')]
    public string $version;

    /**
     * @var string $configHash This is the SHA-256 hex of the snapshotted content used for no-op detection.
     */
    #[JsonProperty('configHash')]
    public string $configHash;

    /**
     * @var ?string $parentVersion This is the prior version label (vN-1). Null on v1 or for branch roots.
     */
    #[JsonProperty('parentVersion')]
    public ?string $parentVersion;

    /**
     * @var ?string $restoredFromVersion The version this version was restored from. Null when it was not restored.
     */
    #[JsonProperty('restoredFromVersion')]
    public ?string $restoredFromVersion;

    /**
     * This is the actor that wrote this version. Email when created via JWT; null
     * when created via API key, and null for a baseline version authored by nobody.
     *
     * @var ?string $createdBy
     */
    #[JsonProperty('createdBy')]
    public ?string $createdBy;

    /**
     * @var ?DateTime $deletedAt This is the soft-delete timestamp. Null when active.
     */
    #[JsonProperty('deletedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $deletedAt;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the version was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var ?string $name This is the name of the squad.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * This is the list of assistants that make up the squad.
     *
     * The call will start with the first assistant in the list.
     *
     * @var array<SquadMemberDto> $members
     */
    #[JsonProperty('members'), ArrayType([SquadMemberDto::class])]
    public array $members;

    /**
     * This can be used to override all the assistants' settings and provide values for their template variables.
     *
     * Both `membersOverrides` and `members[n].assistantOverrides` can be used together. First, `members[n].assistantOverrides` is applied. Then, `membersOverrides` is applied as a global override.
     *
     * @var ?AssistantOverrides $membersOverrides
     */
    #[JsonProperty('membersOverrides')]
    public ?AssistantOverrides $membersOverrides;

    /**
     * @param array{
     *   id: string,
     *   orgId: string,
     *   squadId: string,
     *   version: string,
     *   configHash: string,
     *   createdAt: DateTime,
     *   members: array<SquadMemberDto>,
     *   versionName?: ?string,
     *   versionDescription?: ?string,
     *   parentVersion?: ?string,
     *   restoredFromVersion?: ?string,
     *   createdBy?: ?string,
     *   deletedAt?: ?DateTime,
     *   name?: ?string,
     *   membersOverrides?: ?AssistantOverrides,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->versionName = $values['versionName'] ?? null;
        $this->versionDescription = $values['versionDescription'] ?? null;
        $this->id = $values['id'];
        $this->orgId = $values['orgId'];
        $this->squadId = $values['squadId'];
        $this->version = $values['version'];
        $this->configHash = $values['configHash'];
        $this->parentVersion = $values['parentVersion'] ?? null;
        $this->restoredFromVersion = $values['restoredFromVersion'] ?? null;
        $this->createdBy = $values['createdBy'] ?? null;
        $this->deletedAt = $values['deletedAt'] ?? null;
        $this->createdAt = $values['createdAt'];
        $this->name = $values['name'] ?? null;
        $this->members = $values['members'];
        $this->membersOverrides = $values['membersOverrides'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
