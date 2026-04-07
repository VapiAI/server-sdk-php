<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class PhoneNumberCallRingingHookFilter extends JsonSerializableType
{
    /**
     * @var value-of<PhoneNumberCallRingingHookFilterType> $type This is the type of filter - matches when the specified field starts with any of the given prefixes
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var value-of<PhoneNumberCallRingingHookFilterKey> $key The field to check. Currently only "number" (the caller's phone number) is supported.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var array<string> $startsWith Array of prefixes to match. Do not include the + prefix. Inbound calls from numbers starting with any of these prefixes will trigger the hook actions.
     */
    #[JsonProperty('startsWith'), ArrayType(['string'])]
    public array $startsWith;

    /**
     * @param array{
     *   type: value-of<PhoneNumberCallRingingHookFilterType>,
     *   key: value-of<PhoneNumberCallRingingHookFilterKey>,
     *   startsWith: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->key = $values['key'];
        $this->startsWith = $values['startsWith'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
