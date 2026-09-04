<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class PendingInvitationsResponseDto extends JsonSerializableType
{
    /**
     * @var array<PendingInvitationDto> $invitations
     */
    #[JsonProperty('invitations'), ArrayType([PendingInvitationDto::class])]
    public array $invitations;

    /**
     * @param array{
     *   invitations: array<PendingInvitationDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invitations = $values['invitations'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
