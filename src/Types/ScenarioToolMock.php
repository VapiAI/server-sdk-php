<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ScenarioToolMock extends JsonSerializableType
{
    /**
     * @var string $toolName This is the tool call function name to mock (must match `toolCall.function.name`).
     */
    #[JsonProperty('toolName')]
    public string $toolName;

    /**
     * @var ?string $result This is the result content to return for this tool call.
     */
    #[JsonProperty('result')]
    public ?string $result;

    /**
     * @var ?bool $enabled This is whether this mock is enabled. Defaults to true when omitted.
     */
    #[JsonProperty('enabled')]
    public ?bool $enabled;

    /**
     * @param array{
     *   toolName: string,
     *   result?: ?string,
     *   enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->toolName = $values['toolName'];
        $this->result = $values['result'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
