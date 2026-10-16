<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

/**
 * Result of the recording-consent flow, including consent type and the time consent was granted.
 */
class RecordingConsent extends JsonSerializableType
{
    /**
     * @var value-of<RecordingConsentType> $type This is the type of recording consent.
     */
    #[JsonProperty('type')]
    public string $type;

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
     *   type: value-of<RecordingConsentType>,
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
