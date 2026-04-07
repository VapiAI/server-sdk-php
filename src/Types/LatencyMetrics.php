<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class LatencyMetrics extends JsonSerializableType
{
    /**
     * @var float $turnCount This is the number of conversation turns.
     */
    #[JsonProperty('turnCount')]
    public float $turnCount;

    /**
     * @var ?float $avgTurn This is the average total turn latency in milliseconds.
     */
    #[JsonProperty('avgTurn')]
    public ?float $avgTurn;

    /**
     * @var ?float $avgTranscriber This is the average transcriber latency in milliseconds.
     */
    #[JsonProperty('avgTranscriber')]
    public ?float $avgTranscriber;

    /**
     * @var ?float $avgModel This is the average LLM/model latency in milliseconds.
     */
    #[JsonProperty('avgModel')]
    public ?float $avgModel;

    /**
     * @var ?float $avgVoice This is the average voice/TTS latency in milliseconds.
     */
    #[JsonProperty('avgVoice')]
    public ?float $avgVoice;

    /**
     * @var ?float $avgEndpointing This is the average endpointing latency in milliseconds.
     */
    #[JsonProperty('avgEndpointing')]
    public ?float $avgEndpointing;

    /**
     * @param array{
     *   turnCount: float,
     *   avgTurn?: ?float,
     *   avgTranscriber?: ?float,
     *   avgModel?: ?float,
     *   avgVoice?: ?float,
     *   avgEndpointing?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->turnCount = $values['turnCount'];
        $this->avgTurn = $values['avgTurn'] ?? null;
        $this->avgTranscriber = $values['avgTranscriber'] ?? null;
        $this->avgModel = $values['avgModel'] ?? null;
        $this->avgVoice = $values['avgVoice'] ?? null;
        $this->avgEndpointing = $values['avgEndpointing'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
