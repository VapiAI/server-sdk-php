<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ChatEvalUserMessageMock extends JsonSerializableType
{
    /**
     * This is the role of the message author.
     * For a mock user message, the role is always 'user'
     * @default 'user'
     *
     * @var value-of<ChatEvalUserMessageMockRole> $role
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * This is the content of the user message.
     * This is the message that the user would have sent.
     *
     * @var string $content
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @param array{
     *   role: value-of<ChatEvalUserMessageMockRole>,
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
