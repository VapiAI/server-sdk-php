<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantFallbackWarning extends JsonSerializableType
{
    /**
     * @var value-of<AssistantFallbackWarningCode> $code Machine-readable reason for the warning.
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * Path of the setting the warning is about, relative to the assistant:
     * `voice.fallbackPlan.voices[1]` for one fallback, or
     * `voice.fallbackPlan.voices` for the whole list.
     *
     * @var string $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @var string $message Human-readable explanation, in sentence case.
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   code: value-of<AssistantFallbackWarningCode>,
     *   slot: string,
     *   message: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->slot = $values['slot'];
        $this->message = $values['message'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
