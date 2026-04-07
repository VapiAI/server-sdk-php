<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class MessageAddHookAction extends JsonSerializableType
{
    /**
     * @var OpenAiMessage $message The message to add to the conversation in OpenAI format
     */
    #[JsonProperty('message')]
    public OpenAiMessage $message;

    /**
     * @var ?bool $triggerResponseEnabled Whether to trigger an assistant response after adding the message
     */
    #[JsonProperty('triggerResponseEnabled')]
    public ?bool $triggerResponseEnabled;

    /**
     * @param array{
     *   message: OpenAiMessage,
     *   triggerResponseEnabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
        $this->triggerResponseEnabled = $values['triggerResponseEnabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
