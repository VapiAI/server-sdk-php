<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Overrides storage behavior for an output when HIPAA compliance is enabled.
 */
class ComplianceOverride extends JsonSerializableType
{
    /**
     * @var ?bool $forceStoreOnHipaaEnabled Force storage for this output under HIPAA. Only enable if output contains no sensitive data.
     */
    #[JsonProperty('forceStoreOnHipaaEnabled')]
    public ?bool $forceStoreOnHipaaEnabled;

    /**
     * @param array{
     *   forceStoreOnHipaaEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->forceStoreOnHipaaEnabled = $values['forceStoreOnHipaaEnabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
