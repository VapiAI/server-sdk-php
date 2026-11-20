<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationRunPaymentRequiredResponse extends JsonSerializableType
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
     * @var value-of<SimulationRunPaymentRequiredResponseReason> $reason
     */
    #[JsonProperty('reason')]
    public string $reason;

    /**
     * @param array{
     *   statusCode: float,
     *   message: string,
     *   reason: value-of<SimulationRunPaymentRequiredResponseReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->statusCode = $values['statusCode'];
        $this->message = $values['message'];
        $this->reason = $values['reason'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
