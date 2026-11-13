<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ServiceUnavailableErrorBodyError extends JsonSerializableType
{
    /**
     * @var float $statusCode
     */
    #[JsonProperty('statusCode')]
    public float $statusCode;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var string $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @param array{
     *   statusCode: float,
     *   message: string,
     *   error: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->statusCode = $values['statusCode'];
        $this->message = $values['message'];
        $this->error = $values['error'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
