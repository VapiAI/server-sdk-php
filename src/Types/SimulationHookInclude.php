<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationHookInclude extends JsonSerializableType
{
    /**
     * @var ?bool $transcript Include transcript in the hook payload
     */
    #[JsonProperty('transcript')]
    public ?bool $transcript;

    /**
     * @var ?bool $messages Include messages in the hook payload
     */
    #[JsonProperty('messages')]
    public ?bool $messages;

    /**
     * @var ?bool $recordingUrl Include recordingUrl in the hook payload
     */
    #[JsonProperty('recordingUrl')]
    public ?bool $recordingUrl;

    /**
     * @param array{
     *   transcript?: ?bool,
     *   messages?: ?bool,
     *   recordingUrl?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->transcript = $values['transcript'] ?? null;
        $this->messages = $values['messages'] ?? null;
        $this->recordingUrl = $values['recordingUrl'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
