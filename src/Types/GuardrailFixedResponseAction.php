<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class GuardrailFixedResponseAction extends JsonSerializableType
{
    /**
     * @var value-of<GuardrailFixedResponseActionType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $text Replacement speech; it must pass its own guardrail evaluation.
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @param array{
     *   type: value-of<GuardrailFixedResponseActionType>,
     *   text: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->text = $values['text'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
