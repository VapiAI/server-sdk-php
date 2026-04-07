<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class DialPlanEntry extends JsonSerializableType
{
    /**
     * @var string $phoneNumberId The phone number ID to use for calling the customers in this entry.
     */
    #[JsonProperty('phoneNumberId')]
    public string $phoneNumberId;

    /**
     * @var array<CreateCustomerDto> $customers The list of customers to call using this phone number.
     */
    #[JsonProperty('customers'), ArrayType([CreateCustomerDto::class])]
    public array $customers;

    /**
     * @param array{
     *   phoneNumberId: string,
     *   customers: array<CreateCustomerDto>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->phoneNumberId = $values['phoneNumberId'];
        $this->customers = $values['customers'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
