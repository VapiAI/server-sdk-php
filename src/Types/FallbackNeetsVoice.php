<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class FallbackNeetsVoice extends JsonSerializableType
{
    /**
     * @var mixed $voiceId
     */
    #[JsonProperty('voiceId')]
    public mixed $voiceId;

    /**
     * @param array{
     *   voiceId?: mixed,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->voiceId = $values['voiceId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
