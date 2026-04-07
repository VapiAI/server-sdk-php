<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class ChatEvalAssistantMessageMock extends JsonSerializableType
{
    /**
     * This is the role of the message author.
     * For a mock assistant message, the role is always 'assistant'
     * @default 'assistant'
     *
     * @var value-of<ChatEvalAssistantMessageMockRole> $role
     */
    #[JsonProperty('role')]
    public string $role;

    /**
     * This is the content of the assistant message.
     * This is the message that the assistant would have sent.
     *
     * @var ?string $content
     */
    #[JsonProperty('content')]
    public ?string $content;

    /**
     * @var ?array<ChatEvalAssistantMessageMockToolCall> $toolCalls This is the tool calls that will be made by the assistant.
     */
    #[JsonProperty('toolCalls'), ArrayType([ChatEvalAssistantMessageMockToolCall::class])]
    public ?array $toolCalls;

    /**
     * @param array{
     *   role: value-of<ChatEvalAssistantMessageMockRole>,
     *   content?: ?string,
     *   toolCalls?: ?array<ChatEvalAssistantMessageMockToolCall>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->role = $values['role'];
        $this->content = $values['content'] ?? null;
        $this->toolCalls = $values['toolCalls'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
