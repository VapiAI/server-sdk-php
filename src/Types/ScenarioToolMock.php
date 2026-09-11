<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ScenarioToolMock extends JsonSerializableType
{
    /**
     * @var string $toolName The name of the assistant or squad's tool to mock. Must match the tool's name exactly.
     */
    #[JsonProperty('toolName')]
    public string $toolName;

    /**
     * @var ?string $result The result string returned to the assistant or squad in place of calling the real tool.
     */
    #[JsonProperty('result')]
    public ?string $result;

    /**
     * @var ?bool $enabled Set to `true` to apply this mock during the simulation. Defaults to `true`.
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
