<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class CallHookTranscriberEndpointedSpeechLowConfidence extends JsonSerializableType
{
    /**
     * @var array<CallHookTranscriberEndpointedSpeechLowConfidenceDoItem> $do This is the set of actions to perform when the hook triggers
     */
    #[JsonProperty('do'), ArrayType([CallHookTranscriberEndpointedSpeechLowConfidenceDoItem::class])]
    public array $do;

    /**
     * @var string $on This is the event that triggers this hook
     */
    #[JsonProperty('on')]
    public string $on;

    /**
     * @var ?EndpointedSpeechLowConfidenceOptions $options This is the options for the hook including confidence thresholds
     */
    #[JsonProperty('options')]
    public ?EndpointedSpeechLowConfidenceOptions $options;

    /**
     * @param array{
     *   do: array<CallHookTranscriberEndpointedSpeechLowConfidenceDoItem>,
     *   on: string,
     *   options?: ?EndpointedSpeechLowConfidenceOptions,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->do = $values['do'];
        $this->on = $values['on'];
        $this->options = $values['options'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
