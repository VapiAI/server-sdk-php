<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficTabLatencyMsDto extends JsonSerializableType
{
    /**
     * @var TrafficTabLatencyStatsDto $model
     */
    #[JsonProperty('model')]
    public TrafficTabLatencyStatsDto $model;

    /**
     * @var TrafficTabLatencyStatsDto $voice
     */
    #[JsonProperty('voice')]
    public TrafficTabLatencyStatsDto $voice;

    /**
     * @var TrafficTabLatencyStatsDto $transcriber
     */
    #[JsonProperty('transcriber')]
    public TrafficTabLatencyStatsDto $transcriber;

    /**
     * @var TrafficTabLatencyStatsDto $turn
     */
    #[JsonProperty('turn')]
    public TrafficTabLatencyStatsDto $turn;

    /**
     * @param array{
     *   model: TrafficTabLatencyStatsDto,
     *   voice: TrafficTabLatencyStatsDto,
     *   transcriber: TrafficTabLatencyStatsDto,
     *   turn: TrafficTabLatencyStatsDto,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->model = $values['model'];
        $this->voice = $values['voice'];
        $this->transcriber = $values['transcriber'];
        $this->turn = $values['turn'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
