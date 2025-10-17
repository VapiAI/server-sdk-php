<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class RegexSecurityFilter extends JsonSerializableType
{
    /**
     * @var 'regex' $type The type of security threat to filter.
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
     *   type: 'regex',
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
