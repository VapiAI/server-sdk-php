<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class TrafficTabVersionMetricsDto extends JsonSerializableType
{
    /**
     * @var ?string $assistantVersionId
     */
    #[JsonProperty('assistantVersionId')]
    public ?string $assistantVersionId;

    /**
     * @var ?string $assistantVersionLabel The published version label, such as "v7". Null when no version row resolves (unversioned calls, or a since-purged version).
     */
    #[JsonProperty('assistantVersionLabel')]
    public ?string $assistantVersionLabel;

    /**
     * @var ?bool $unversioned True for the row aggregating calls with no assistant version (stored as SQL NULL).
     */
    #[JsonProperty('unversioned')]
    public ?bool $unversioned;

    /**
     * @var float $calls
     */
    #[JsonProperty('calls')]
    public float $calls;

    /**
     * @var ?float $configuredPercentage The version's share in the currently-governing allocation. Null when the version is not in the current split — never rendered as 0%.
     */
    #[JsonProperty('configuredPercentage')]
    public ?float $configuredPercentage;

    /**
     * @var float $actualPercentage calls / totalCalls * 100 over the window, rounded to 3 decimals.
     */
    #[JsonProperty('actualPercentage')]
    public float $actualPercentage;

    /**
     * @var TrafficTabDurationSecondsDto $durationSeconds
     */
    #[JsonProperty('durationSeconds')]
    public TrafficTabDurationSecondsDto $durationSeconds;

    /**
     * @var TrafficTabCostPerMinuteDto $costPerMinute
     */
    #[JsonProperty('costPerMinute')]
    public TrafficTabCostPerMinuteDto $costPerMinute;

    /**
     * @var TrafficTabLatencyMsDto $latencyMs
     */
    #[JsonProperty('latencyMs')]
    public TrafficTabLatencyMsDto $latencyMs;

    /**
     * @var array<TrafficTabEndedReasonCountDto> $endedReasons Full per-reason counts; the UI unions and top-Ns.
     */
    #[JsonProperty('endedReasons'), ArrayType([TrafficTabEndedReasonCountDto::class])]
    public array $endedReasons;

    /**
     * @var array<TrafficTabTimeseriesPointDto> $timeseries
     */
    #[JsonProperty('timeseries'), ArrayType([TrafficTabTimeseriesPointDto::class])]
    public array $timeseries;

    /**
     * @var ?array<TrafficTabStructuredOutputDto> $structuredOutputs Present only when structuredOutputIds was given.
     */
    #[JsonProperty('structuredOutputs'), ArrayType([TrafficTabStructuredOutputDto::class])]
    public ?array $structuredOutputs;

    /**
     * @param array{
     *   calls: float,
     *   actualPercentage: float,
     *   durationSeconds: TrafficTabDurationSecondsDto,
     *   costPerMinute: TrafficTabCostPerMinuteDto,
     *   latencyMs: TrafficTabLatencyMsDto,
     *   endedReasons: array<TrafficTabEndedReasonCountDto>,
     *   timeseries: array<TrafficTabTimeseriesPointDto>,
     *   assistantVersionId?: ?string,
     *   assistantVersionLabel?: ?string,
     *   unversioned?: ?bool,
     *   configuredPercentage?: ?float,
     *   structuredOutputs?: ?array<TrafficTabStructuredOutputDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantVersionId = $values['assistantVersionId'] ?? null;
        $this->assistantVersionLabel = $values['assistantVersionLabel'] ?? null;
        $this->unversioned = $values['unversioned'] ?? null;
        $this->calls = $values['calls'];
        $this->configuredPercentage = $values['configuredPercentage'] ?? null;
        $this->actualPercentage = $values['actualPercentage'];
        $this->durationSeconds = $values['durationSeconds'];
        $this->costPerMinute = $values['costPerMinute'];
        $this->latencyMs = $values['latencyMs'];
        $this->endedReasons = $values['endedReasons'];
        $this->timeseries = $values['timeseries'];
        $this->structuredOutputs = $values['structuredOutputs'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
