<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CampaignContactCounters extends JsonSerializableType
{
    /**
     * @var float $pending
     */
    #[JsonProperty('pending')]
    public float $pending;

    /**
     * @var float $dispatched
     */
    #[JsonProperty('dispatched')]
    public float $dispatched;

    /**
     * @var float $completed
     */
    #[JsonProperty('completed')]
    public float $completed;

    /**
     * @var float $failed
     */
    #[JsonProperty('failed')]
    public float $failed;

    /**
     * @var float $skipped
     */
    #[JsonProperty('skipped')]
    public float $skipped;

    /**
     * @var float $predialFailed
     */
    #[JsonProperty('predialFailed')]
    public float $predialFailed;

    /**
     * @param array{
     *   pending: float,
     *   dispatched: float,
     *   completed: float,
     *   failed: float,
     *   skipped: float,
     *   predialFailed: float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pending = $values['pending'];
        $this->dispatched = $values['dispatched'];
        $this->completed = $values['completed'];
        $this->failed = $values['failed'];
        $this->skipped = $values['skipped'];
        $this->predialFailed = $values['predialFailed'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
