<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;
use DateTime;
use Vapi\Core\Types\Date;

class RecordingConsent extends JsonSerializableType
{
    /**
     * @var array<string, mixed> $type This is the type of recording consent.
     */
    #[JsonProperty('type'), ArrayType(['string' => 'mixed'])]
    public array $type;

    /**
     * This is the date and time the recording consent was granted.
     * If not specified, it means the recording consent was not granted.
     *
     * @var ?DateTime $grantedAt
     */
    #[JsonProperty('grantedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $grantedAt;

    /**
     * @param array{
     *   type: array<string, mixed>,
     *   grantedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->grantedAt = $values['grantedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
