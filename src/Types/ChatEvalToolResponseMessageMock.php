<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ChatEvalToolResponseMessageMock extends JsonSerializableType
{
    /**
     * This is the role of the message author.
     * For a mock tool response message, the role is always 'tool'
     * @default 'tool'
     *
     * @var value-of<ChatEvalToolResponseMessageMockRole> $role
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * @var string $content This is the content of the tool response message. JSON Objects should be stringified.
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @param array{
     *   role: value-of<ChatEvalToolResponseMessageMockRole>,
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
