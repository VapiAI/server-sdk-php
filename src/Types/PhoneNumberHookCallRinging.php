<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class PhoneNumberHookCallRinging extends JsonSerializableType
{
    /**
     * @var ?array<PhoneNumberCallRingingHookFilter> $filters Optional filters to decide when to trigger the hook. Currently supports filtering by caller country code.
     */
    #[JsonProperty('filters'), ArrayType([PhoneNumberCallRingingHookFilter::class])]
    public ?array $filters;

    /**
     * @var array<PhoneNumberHookCallRingingDoItem> $do Only the first action will be executed. Additional actions will be ignored.
     */
    #[JsonProperty('do'), ArrayType([PhoneNumberHookCallRingingDoItem::class])]
    public array $do;

    /**
     * @param array{
     *   do: array<PhoneNumberHookCallRingingDoItem>,
     *   filters?: ?array<PhoneNumberCallRingingHookFilter>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->filters = $values['filters'] ?? null;
        $this->do = $values['do'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
