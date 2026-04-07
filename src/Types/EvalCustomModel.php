<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class EvalCustomModel extends JsonSerializableType
{
    /**
     * @var string $url These is the URL we'll use for the OpenAI client's `baseURL`. Ex. https://openrouter.ai/api/v1
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @var ?array<string, mixed> $headers These are the headers we'll use for the OpenAI client's `headers`.
     */
    #[JsonProperty('headers'), ArrayType(['string' => 'mixed'])]
    public ?array $headers;

    /**
     * @var ?float $timeoutSeconds This sets the timeout for the connection to the custom provider without needing to stream any tokens back. Default is 20 seconds.
     */
    #[JsonProperty('timeoutSeconds')]
    public ?float $timeoutSeconds;

    /**
     * @var string $model This is the name of the model. Ex. gpt-4o
     */
    #[JsonProperty('model')]
    public string $model;

    /**
     * @var ?float $temperature This is the temperature of the model. For LLM-as-a-judge, it's recommended to set it between 0 - 0.3 to avoid hallucinations and ensure the model judges the output correctly based on the instructions.
     */
    #[JsonProperty('temperature')]
    public ?float $temperature;

    /**
     * This is the max tokens of the model.
     * If your Judge instructions return `true` or `false` takes only 1 token (as per the OpenAI Tokenizer), and therefore is recommended to set it to a low number to force the model to return a short response.
     *
     * @var ?float $maxTokens
     */
    #[JsonProperty('maxTokens')]
    public ?float $maxTokens;

    /**
     * These are the messages which will instruct the AI Judge on how to evaluate the assistant message.
     * The LLM-Judge must respond with "pass" or "fail" to indicate if the assistant message passes the eval.
     *
     * To access the messages in the mock conversation, use the LiquidJS variable `{{messages}}`.
     * The assistant message to be evaluated will be passed as the last message in the `messages` array and can be accessed using `{{messages[-1]}}`.
     *
     * It is recommended to use the system message to instruct the LLM how to evaluate the assistant message, and then use the first user message to pass the assistant message to be evaluated.
     *
     * @var array<array<string, mixed>> $messages
     */
    #[JsonProperty('messages'), ArrayType([['string' => 'mixed']])]
    public array $messages;

    /**
     * @param array{
     *   url: string,
     *   model: string,
     *   messages: array<array<string, mixed>>,
     *   headers?: ?array<string, mixed>,
     *   timeoutSeconds?: ?float,
     *   temperature?: ?float,
     *   maxTokens?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
        $this->headers = $values['headers'] ?? null;
        $this->timeoutSeconds = $values['timeoutSeconds'] ?? null;
        $this->model = $values['model'];
        $this->temperature = $values['temperature'] ?? null;
        $this->maxTokens = $values['maxTokens'] ?? null;
        $this->messages = $values['messages'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
