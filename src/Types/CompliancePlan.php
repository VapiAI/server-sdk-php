<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CompliancePlan extends JsonSerializableType
{
    /**
     * @var ?bool $hipaaEnabled When this is enabled, logs, recordings, and transcriptions will be stored in HIPAA-compliant storage. Defaults to false. Only HIPAA-compliant providers will be available for LLM, Voice, and Transcriber respectively. This setting is only honored if the organization is on an Enterprise subscription or has purchased the HIPAA add-on.
     */
    #[JsonProperty('hipaaEnabled')]
    public ?bool $hipaaEnabled;

    /**
     * When this is enabled, the user will be restricted to use PCI-compliant providers, and no logs or transcripts are stored.
     * At the end of the call, you will receive an end-of-call-report message to store on your server. Defaults to false.
     *
     * @var ?bool $pciEnabled
     */
    #[JsonProperty('pciEnabled')]
    public ?bool $pciEnabled;

    /**
     * @var ?SecurityFilterPlan $securityFilterPlan This is the security filter plan for the assistant. It allows filtering of transcripts for security threats before sending to LLM.
     */
    #[JsonProperty('securityFilterPlan')]
    public ?SecurityFilterPlan $securityFilterPlan;

    /**
     * @var ?CompliancePlanRecordingConsentPlan $recordingConsentPlan
     */
    #[JsonProperty('recordingConsentPlan')]
    public ?CompliancePlanRecordingConsentPlan $recordingConsentPlan;

    /**
     * @param array{
     *   hipaaEnabled?: ?bool,
     *   pciEnabled?: ?bool,
     *   securityFilterPlan?: ?SecurityFilterPlan,
     *   recordingConsentPlan?: ?CompliancePlanRecordingConsentPlan,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->hipaaEnabled = $values['hipaaEnabled'] ?? null;
        $this->pciEnabled = $values['pciEnabled'] ?? null;
        $this->securityFilterPlan = $values['securityFilterPlan'] ?? null;
        $this->recordingConsentPlan = $values['recordingConsentPlan'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
