<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TestSuitePhoneNumber extends JsonSerializableType
{
    /**
     * @var value-of<TestSuitePhoneNumberProvider> $provider This is the provider of the phone number.
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var string $number This is the phone number that is being tested.
     */
    #[JsonProperty('number')]
    public string $number;

    /**
     * @param array{
     *   provider: value-of<TestSuitePhoneNumberProvider>,
     *   number: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->provider = $values['provider'];
        $this->number = $values['number'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
