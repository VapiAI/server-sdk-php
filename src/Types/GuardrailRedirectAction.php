<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GuardrailRedirectAction extends JsonSerializableType
{
    /**
     * @var value-of<GuardrailRedirectActionType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $instructions Steering instructions for generating a replacement candidate.
     */
    #[JsonProperty('instructions')]
    public string $instructions;

    /**
     * @param array{
     *   type: value-of<GuardrailRedirectActionType>,
     *   instructions: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->instructions = $values['instructions'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
