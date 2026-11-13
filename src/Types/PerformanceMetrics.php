<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Call performance measurements, including per-turn and average provider, endpointing, transport, and interruption metrics.
 */
class PerformanceMetrics extends JsonSerializableType
{
    /**
     * These are the individual latencies for each turn, in milliseconds, measured on Vapi's servers without network or playback time.
     * A turn is recorded only when the assistant replies to the user. A first message the assistant speaks first is not recorded; with `assistant-waits-for-user` it is recorded, with `endpointingLatency` 0. A component that was not measured on a turn is 0.
     *
     * @var ?array<TurnLatency> $turnLatencies
     */
    #[JsonProperty('turnLatencies'), ArrayType([TurnLatency::class])]
    public ?array $turnLatencies;

    /**
     * This is the average `modelLatency` across `turnLatencies`, in milliseconds.
     * Turns that recorded 0 because the model latency was not measured are included in the average.
     *
     * @var ?float $modelLatencyAverage
     */
    #[JsonProperty('modelLatencyAverage')]
    public ?float $modelLatencyAverage;

    /**
     * This is the average `voiceLatency` across `turnLatencies`, in milliseconds.
     * Turns that recorded 0 because the voice latency was not measured are included in the average.
     *
     * @var ?float $voiceLatencyAverage
     */
    #[JsonProperty('voiceLatencyAverage')]
    public ?float $voiceLatencyAverage;

    /**
     * @var ?float $transcriberLatencyAverage This is the average latency for the transcriber.
     */
    #[JsonProperty('transcriberLatencyAverage')]
    public ?float $transcriberLatencyAverage;

    /**
     * @var ?float $endpointingLatencyAverage This is the average latency for the endpointing.
     */
    #[JsonProperty('endpointingLatencyAverage')]
    public ?float $endpointingLatencyAverage;

    /**
     * @var ?float $turnLatencyAverage This is the average latency for complete turns.
     */
    #[JsonProperty('turnLatencyAverage')]
    public ?float $turnLatencyAverage;

    /**
     * @var ?float $fromTransportLatencyAverage This is the average latency for packets received from the transport provider in milliseconds.
     */
    #[JsonProperty('fromTransportLatencyAverage')]
    public ?float $fromTransportLatencyAverage;

    /**
     * @var ?float $toTransportLatencyAverage This is the average latency for packets sent to the transport provider in milliseconds.
     */
    #[JsonProperty('toTransportLatencyAverage')]
    public ?float $toTransportLatencyAverage;

    /**
     * @var ?float $numUserInterrupted This is the number of times the user was interrupted by the assistant during the call.
     */
    #[JsonProperty('numUserInterrupted')]
    public ?float $numUserInterrupted;

    /**
     * @var ?float $numAssistantInterrupted This is the number of times the assistant was interrupted by the user during the call.
     */
    #[JsonProperty('numAssistantInterrupted')]
    public ?float $numAssistantInterrupted;

    /**
     * This is `true` when the call was recorded with `TurnLatency.unmeasured`, so a turn without that list had every component measured.
     * Absent on calls recorded before `unmeasured` existed, where a 0 latency may mean either 0ms or "not measured".
     *
     * @var ?bool $turnLatencyUnmeasuredTracked
     */
    #[JsonProperty('turnLatencyUnmeasuredTracked')]
    public ?bool $turnLatencyUnmeasuredTracked;

    /**
     * @param array{
     *   turnLatencies?: ?array<TurnLatency>,
     *   modelLatencyAverage?: ?float,
     *   voiceLatencyAverage?: ?float,
     *   transcriberLatencyAverage?: ?float,
     *   endpointingLatencyAverage?: ?float,
     *   turnLatencyAverage?: ?float,
     *   fromTransportLatencyAverage?: ?float,
     *   toTransportLatencyAverage?: ?float,
     *   numUserInterrupted?: ?float,
     *   numAssistantInterrupted?: ?float,
     *   turnLatencyUnmeasuredTracked?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->turnLatencies = $values['turnLatencies'] ?? null;
        $this->modelLatencyAverage = $values['modelLatencyAverage'] ?? null;
        $this->voiceLatencyAverage = $values['voiceLatencyAverage'] ?? null;
        $this->transcriberLatencyAverage = $values['transcriberLatencyAverage'] ?? null;
        $this->endpointingLatencyAverage = $values['endpointingLatencyAverage'] ?? null;
        $this->turnLatencyAverage = $values['turnLatencyAverage'] ?? null;
        $this->fromTransportLatencyAverage = $values['fromTransportLatencyAverage'] ?? null;
        $this->toTransportLatencyAverage = $values['toTransportLatencyAverage'] ?? null;
        $this->numUserInterrupted = $values['numUserInterrupted'] ?? null;
        $this->numAssistantInterrupted = $values['numAssistantInterrupted'] ?? null;
        $this->turnLatencyUnmeasuredTracked = $values['turnLatencyUnmeasuredTracked'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
