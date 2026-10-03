<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Error returned for one customer entry in a batch call request.
 */
class CallBatchError extends JsonSerializableType
{
    /**
     * @var CreateCustomerDto $customer Customer configuration associated with the failed call.
     */
    #[JsonProperty('customer')]
    public CreateCustomerDto $customer;

    /**
     * @var string $error Error message explaining why the call could not be created.
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @param array{
     *   customer: CreateCustomerDto,
     *   error: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customer = $values['customer'];
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
