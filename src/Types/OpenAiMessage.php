<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * A conversation message represented in OpenAI chat format.
 */
class OpenAiMessage extends JsonSerializableType
{
    /**
     * @var ?string $content Content of the conversation message.
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @var value-of<OpenAiMessageRole> $role Role associated with the conversation message.
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @param array{
     *   role: value-of<OpenAiMessageRole>,
     *   content?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->content = $values['content'] ?? null;
        $this->role = $values['role'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
