<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ToolRef extends JsonSerializableType
{
    /**
     * @var string $toolId This is the unique identifier of the tool whose version is being pinned.
     */
    #[JsonProperty('toolId')]
    public string $toolId;

    /**
     * @var string $version Public version label of the tool, e.g. "v3"
     */
    #[JsonProperty('version')]
    public string $version;

    /**
     * @param array{
     *   toolId: string,
     *   version: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->toolId = $values['toolId'];
        $this->version = $values['version'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
