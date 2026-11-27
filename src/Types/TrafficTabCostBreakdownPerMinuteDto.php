<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TrafficTabCostBreakdownPerMinuteDto extends JsonSerializableType
{
    /**
     * @var ?float $llm
     */
    #[JsonProperty('llm')]
    public ?float $llm;

    /**
     * @var ?float $stt
     */
    #[JsonProperty('stt')]
    public ?float $stt;

    /**
     * @var ?float $tts
     */
    #[JsonProperty('tts')]
    public ?float $tts;

    /**
     * @var ?float $vapi
     */
    #[JsonProperty('vapi')]
    public ?float $vapi;

    /**
     * @var ?float $transport
     */
    #[JsonProperty('transport')]
    public ?float $transport;

    /**
     * @param array{
     *   llm?: ?float,
     *   stt?: ?float,
     *   tts?: ?float,
     *   vapi?: ?float,
     *   transport?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->llm = $values['llm'] ?? null;
        $this->stt = $values['stt'] ?? null;
        $this->tts = $values['tts'] ?? null;
        $this->vapi = $values['vapi'] ?? null;
        $this->transport = $values['transport'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
