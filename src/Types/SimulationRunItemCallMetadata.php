<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationRunItemCallMetadata extends JsonSerializableType
{
    /**
     * @var ?string $transcript This is the transcript of the conversation.
     */
    #[JsonProperty('transcript')]
    public ?string $transcript;

    /**
     * @var ?array<array<string, mixed>> $messages This is the list of conversation messages in OpenAI format.
     */
    #[JsonProperty('messages'), ArrayType([['string' => 'mixed']])]
    public ?array $messages;

    /**
     * @var ?string $recordingUrl This is the URL to the call recording.
     */
    #[JsonProperty('recordingUrl')]
    public ?string $recordingUrl;

    /**
     * @var ?SimulationRunItemCallMonitor $monitor This is the call monitoring data (live listen URL).
     */
    #[JsonProperty('monitor')]
    public ?SimulationRunItemCallMonitor $monitor;

    /**
     * @param array{
     *   transcript?: ?string,
     *   messages?: ?array<array<string, mixed>>,
     *   recordingUrl?: ?string,
     *   monitor?: ?SimulationRunItemCallMonitor,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->transcript = $values['transcript'] ?? null;
        $this->messages = $values['messages'] ?? null;
        $this->recordingUrl = $values['recordingUrl'] ?? null;
        $this->monitor = $values['monitor'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
