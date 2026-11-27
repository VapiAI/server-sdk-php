<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class LangfuseServerProbeDto extends JsonSerializableType
{
    /**
     * @var string $apiUrl The Langfuse host URL to probe, e.g. https://cloud.langfuse.com. Only the unauthenticated health endpoint is read; no keys are involved.
     */
    #[JsonProperty('apiUrl')]
    public string $apiUrl;

    /**
     * @param array{
     *   apiUrl: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->apiUrl = $values['apiUrl'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
