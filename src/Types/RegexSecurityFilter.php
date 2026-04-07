<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class RegexSecurityFilter extends JsonSerializableType
{
    /**
     * @var value-of<RegexSecurityFilterType> $type The type of security threat to filter.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $regex The regex pattern to filter.
     */
    #[JsonProperty('regex')]
    public string $regex;

    /**
     * @param array{
     *   type: value-of<RegexSecurityFilterType>,
     *   regex: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->regex = $values['regex'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
