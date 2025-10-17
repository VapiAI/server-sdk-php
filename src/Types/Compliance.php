<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class Compliance extends JsonSerializableType
{
    /**
     * @var ?RecordingConsent $recordingConsent This is the recording consent of the call. Configure in `assistant.compliancePlan.recordingConsentPlan`.
     */
    #[JsonProperty('recordingConsent')]
    public ?RecordingConsent $recordingConsent;

    /**
     * @param array{
     *   recordingConsent?: ?RecordingConsent,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->recordingConsent = $values['recordingConsent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
