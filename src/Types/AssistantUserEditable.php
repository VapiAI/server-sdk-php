<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantUserEditable extends JsonSerializableType
{
    /**
     * @var mixed $serverMessages
     */
    #[JsonProperty('serverMessages')]
    public mixed $serverMessages;

    /**
     * @param array{
     *   serverMessages?: mixed,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->serverMessages = $values['serverMessages'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
