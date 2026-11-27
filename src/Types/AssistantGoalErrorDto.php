<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

class AssistantGoalErrorDto extends JsonSerializableType
{
    /**
     * @var int $statusCode
     */
    #[JsonProperty('statusCode')]
    public int $statusCode;

    /**
     * @var ?string $error
     */
    #[JsonProperty('error')]
    public ?string $error;

    /**
     * @var (
     *    string
     *   |array<string>
     * ) $message
     */
    #[JsonProperty('message'), Union('string', ['string'])]
    public string|array $message;

    /**
     * @param array{
     *   statusCode: int,
     *   message: (
     *    string
     *   |array<string>
     * ),
     *   error?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->statusCode = $values['statusCode'];
        $this->error = $values['error'] ?? null;
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
