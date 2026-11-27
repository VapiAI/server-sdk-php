<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Controls whether Krisp smart denoising filters background speech and noise.
 */
class SmartDenoisingPlan extends JsonSerializableType
{
    /**
     * @var ?bool $enabled Whether smart denoising using Krisp is enabled.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * Intensity of the applied noise suppression, in the range [0, 100].
     * - 0 indicates no noise suppression (audio passes through Krisp unchanged).
     * - 100 indicates full noise suppression and is the historical default.
     * Lower values are gentler; useful for narrowband telephony audio where
     * aggressive suppression can over-attenuate brief or quiet user utterances.
     *
     * Per-call intensity is in beta, rolling out to select organizations and
     * regions. Where it is not available, or the intensity-aware denoiser cannot
     * be reached for a call, the standard denoiser runs at full suppression
     * (100) whatever this is set to, so 0 does not turn suppression off there;
     * set `enabled` to false for that. If the standard denoiser cannot be
     * reached either, the call's audio passes through without smart denoising.
     *
     * @default 100
     *
     * @var ?float $intensity
     */
    #[JsonProperty('intensity')]
    public ?float $intensity;

    /**
     * @param array{
     *   enabled?: ?bool,
     *   intensity?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enabled = $values['enabled'] ?? null;
        $this->intensity = $values['intensity'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
