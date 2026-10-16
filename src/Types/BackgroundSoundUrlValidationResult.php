<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class BackgroundSoundUrlValidationResult extends JsonSerializableType
{
    /**
     * @var bool $valid Whether the URL currently serves a live media file. When false, calls configured with this URL silently play no background sound.
     */
    #[JsonProperty('valid')]
    public bool $valid;

    /**
     * @var ?value-of<BackgroundSoundUrlValidationResultReason> $reason Why validation failed. Only present when valid is false.
     */
    #[JsonProperty('reason')]
    public ?string $reason;

    /**
     * @var ?float $status The HTTP status the URL returned, when a response was received.
     */
    #[JsonProperty('status')]
    public ?float $status;

    /**
     * @var ?string $contentType The content-type the URL returned, when a response was received.
     */
    #[JsonProperty('contentType')]
    public ?string $contentType;

    /**
     * @param array{
     *   valid: bool,
     *   reason?: ?value-of<BackgroundSoundUrlValidationResultReason>,
     *   status?: ?float,
     *   contentType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->valid = $values['valid'];
        $this->reason = $values['reason'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->contentType = $values['contentType'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
