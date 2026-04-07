<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ChatEvalSystemMessageMock extends JsonSerializableType
{
    /**
     * This is the role of the message author.
     * For a mock system message, the role is always 'system'
     * @default 'system'
     *
     * @var value-of<ChatEvalSystemMessageMockRole> $role
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * This is the content of the system message that would have been added in the middle of the conversation.
     * Do not include the assistant prompt as a part of this message. It will automatically be fetched during runtime.
     *
     * @var string $content
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @param array{
     *   role: value-of<ChatEvalSystemMessageMockRole>,
     *   content: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->role = $values['role'];
        $this->content = $values['content'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
