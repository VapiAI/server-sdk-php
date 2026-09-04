<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

/**
 * A hook action that makes the assistant speak exact text or generate a response from a prompt.
 */
class SayHookAction extends JsonSerializableType
{
    /**
     * @var (
     *    string
     *   |array<string>
     * )|null $exact This is the exact message to say. When a string array is provided, one is randomly selected.
     */
    #[JsonProperty('exact'), Union('string', ['string'], 'null')]
    public string|array|null $exact;

    /**
     * This is the prompt for the assistant to generate a response based on existing conversation.
     * Can be a string or an array of chat messages.
     *
     * @var (
     *    string
     *   |array<(
     *    SystemMessage
     *   |UserMessage
     *   |AssistantMessage
     *   |ToolMessage
     *   |DeveloperMessage
     * )>
     * )|null $prompt
     */
    #[JsonProperty('prompt'), Union('string', [new Union(SystemMessage::class, UserMessage::class, AssistantMessage::class, ToolMessage::class, DeveloperMessage::class)], 'null')]
    public string|array|null $prompt;

    /**
     * @param array{
     *   exact?: (
     *    string
     *   |array<string>
     * )|null,
     *   prompt?: (
     *    string
     *   |array<(
     *    SystemMessage
     *   |UserMessage
     *   |AssistantMessage
     *   |ToolMessage
     *   |DeveloperMessage
     * )>
     * )|null,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->exact = $values['exact'] ?? null;
        $this->prompt = $values['prompt'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
