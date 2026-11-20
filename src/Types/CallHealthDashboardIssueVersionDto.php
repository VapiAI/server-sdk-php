<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardIssueVersionDto extends JsonSerializableType
{
    /**
     * @var ?string $assistantVersionId The version the calls ran on; null groups the calls that ran on no version.
     */
    #[JsonProperty('assistantVersionId')]
    public ?string $assistantVersionId;

    /**
     * @var ?string $assistantVersion The version's label, such as v3; absent for calls on no version or whose label was unavailable at registration.
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

    /**
     * @var int $affectedCallCount Distinct visible calls on this version matching the issue in the window.
     */
    #[JsonProperty('affectedCallCount')]
    public int $affectedCallCount;

    /**
     * @var int $analyzedCallCount Accepted current-goal outcomes on this version for the issue's assistant in the window.
     */
    #[JsonProperty('analyzedCallCount')]
    public int $analyzedCallCount;

    /**
     * @var ?float $affectedCallRate affectedCallCount / analyzedCallCount; omitted for a zero denominator.
     */
    #[JsonProperty('affectedCallRate')]
    public ?float $affectedCallRate;

    /**
     * @param array{
     *   affectedCallCount: int,
     *   analyzedCallCount: int,
     *   assistantVersionId?: ?string,
     *   assistantVersion?: ?string,
     *   affectedCallRate?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantVersionId = $values['assistantVersionId'] ?? null;
        $this->assistantVersion = $values['assistantVersion'] ?? null;
        $this->affectedCallCount = $values['affectedCallCount'];
        $this->analyzedCallCount = $values['analyzedCallCount'];
        $this->affectedCallRate = $values['affectedCallRate'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
