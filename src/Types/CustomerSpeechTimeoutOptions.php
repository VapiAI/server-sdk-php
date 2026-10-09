<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Controls how long a hook waits for customer speech, how often it can trigger, and when its trigger counter resets.
 */
class CustomerSpeechTimeoutOptions extends JsonSerializableType
{
    /**
     * @var ?value-of<CustomerSpeechTimeoutOptionsTriggerResetMode> $triggerResetMode Controls whether the hook's trigger counter resets after the customer speaks. Defaults to `never`.
     */
    #[JsonProperty('triggerResetMode')]
    public ?string $triggerResetMode;

    /**
     * This is the timeout in seconds before action is triggered.
     * The clock starts when the assistant finishes speaking and remains active until the user speaks.
     *
     * @default 7.5
     * @minimum 2
     * @maximum 1000
     *
     * @var float $timeoutSeconds
     */
    #[JsonProperty('timeoutSeconds')]
    public float $timeoutSeconds;

    /**
     * This is the maximum number of times the hook will trigger in a call.
     *
     * @default 3
     *
     * @var ?float $triggerMaxCount
     */
    #[JsonProperty('triggerMaxCount')]
    public ?float $triggerMaxCount;

    /**
     * @param array{
     *   timeoutSeconds: float,
     *   triggerResetMode?: ?value-of<CustomerSpeechTimeoutOptionsTriggerResetMode>,
     *   triggerMaxCount?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->triggerResetMode = $values['triggerResetMode'] ?? null;
        $this->timeoutSeconds = $values['timeoutSeconds'];
        $this->triggerMaxCount = $values['triggerMaxCount'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
