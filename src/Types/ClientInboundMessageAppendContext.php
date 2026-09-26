<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ClientInboundMessageAppendContext extends JsonSerializableType
{
    /**
     * Commentary is spoken in the model's own words; thinking is silent context;
     * instructions steer the speaker, including requests to try saying something.
     * Acceptance does not guarantee exact wording or speech completion.
     *
     * @var value-of<ClientInboundMessageAppendContextKind> $kind
     */
    #[JsonProperty('kind')]
    public string $kind;

    /**
     * @var string $content
     */
    #[JsonProperty('content')]
    public string $content;

    /**
     * @param array{
     *   kind: value-of<ClientInboundMessageAppendContextKind>,
     *   content: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->kind = $values['kind'];
        $this->content = $values['content'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
