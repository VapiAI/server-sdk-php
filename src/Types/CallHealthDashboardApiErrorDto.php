<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardApiErrorDto extends JsonSerializableType
{
    /**
     * @var string $code
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @var string $requestId
     */
    #[JsonProperty('requestId')]
    public string $requestId;

    /**
     * @var bool $retryable
     */
    #[JsonProperty('retryable')]
    public bool $retryable;

    /**
     * @param array{
     *   code: string,
     *   message: string,
     *   requestId: string,
     *   retryable: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->message = $values['message'];
        $this->requestId = $values['requestId'];
        $this->retryable = $values['retryable'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
