<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SayPhoneNumberHookAction extends JsonSerializableType
{
    /**
     * @var string $exact This is the message to say
     */
    #[JsonProperty('exact')]
    public string $exact;

    /**
     * @param array{
     *   exact: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->exact = $values['exact'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
