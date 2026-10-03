<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use DateTime;
use Vapi\Core\Types\Date;

/**
 * A saved squad configuration that coordinates a group of assistants during a conversation. The first member starts the call, and member destinations control transfers between assistants.
 */
class Squad extends JsonSerializableType
{
    /**
     * This is the latest version label (e.g. `v3`) of the squad in the version
     * history. `null` while the org is not yet onboarded to versioning, or for
     * squads that have not yet been published under it.
     *
     * @var ?string $latestVersion
     */
    #[JsonProperty('latestVersion')]
    public ?string $latestVersion;

    /**
     * @var ?array<ModelDeprecationNotice> $modelDeprecations Read-only. Present only when a model this configuration uses is deprecated or retired in Vapi's model deprecation registry, judged on the day of the response. Each entry names the slot that carries the model (for example `model` or `model.fallbackModels[1]`), the deprecation and retirement dates as `YYYY-MM-DD` in UTC, and the recommended replacement model: the registry's replacement, followed through any further retirements as of the response date, so it names a model that is alive on that day. Ignored if sent back in a create or update request.
     */
    #[JsonProperty('modelDeprecations'), ArrayType([ModelDeprecationNotice::class])]
    public ?array $modelDeprecations;

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
     * @var string $id This is the unique identifier for the squad.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $orgId This is the unique identifier for the org that this squad belongs to.
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var DateTime $createdAt This is the ISO 8601 date-time string of when the squad was created.
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $createdAt;

    /**
     * @var DateTime $updatedAt This is the ISO 8601 date-time string of when the squad was last updated.
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public DateTime $updatedAt;

    /**
     * @param array{
     *   members: array<SquadMemberDto>,
     *   id: string,
     *   orgId: string,
     *   createdAt: DateTime,
     *   updatedAt: DateTime,
     *   latestVersion?: ?string,
     *   modelDeprecations?: ?array<ModelDeprecationNotice>,
     *   name?: ?string,
     *   membersOverrides?: ?AssistantOverrides,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->latestVersion = $values['latestVersion'] ?? null;
        $this->modelDeprecations = $values['modelDeprecations'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->members = $values['members'];
        $this->membersOverrides = $values['membersOverrides'] ?? null;
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
