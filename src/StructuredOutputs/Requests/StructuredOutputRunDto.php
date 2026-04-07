<?php

namespace Vapi\StructuredOutputs\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Types\CreateStructuredOutputDto;
use Vapi\Core\Types\ArrayType;

class StructuredOutputRunDto extends JsonSerializableType
{
    /**
     * This is the preview flag for the re-run. If true, the re-run will be executed and the response will be returned immediately and the call artifact will NOT be updated.
     * If false (default), the re-run will be executed and the response will be updated in the call artifact.
     *
     * @var ?bool $previewEnabled
     */
    #[JsonProperty('previewEnabled')]
    public ?bool $previewEnabled;

    /**
     * This is the ID of the structured output that will be run. This must be provided unless a transient structured output is provided.
     * When the re-run is executed, only the value of this structured output will be replaced with the new value, or added if not present.
     *
     * @var ?string $structuredOutputId
     */
    #[JsonProperty('structuredOutputId')]
    public ?string $structuredOutputId;

    /**
     * This is the transient structured output that will be run. This must be provided if a structured output ID is not provided.
     * When the re-run is executed, the structured output value will be added to the existing artifact.
     *
     * @var ?CreateStructuredOutputDto $structuredOutput
     */
    #[JsonProperty('structuredOutput')]
    public ?CreateStructuredOutputDto $structuredOutput;

    /**
     * This is the array of callIds that will be updated with the new structured output value. If preview is true, this array must be provided and contain exactly 1 callId.
     * If preview is false, up to 100 callIds may be provided.
     *
     * @var array<string> $callIds
     */
    #[JsonProperty('callIds'), ArrayType(['string'])]
    public array $callIds;

    /**
     * @param array{
     *   callIds: array<string>,
     *   previewEnabled?: ?bool,
     *   structuredOutputId?: ?string,
     *   structuredOutput?: ?CreateStructuredOutputDto,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->previewEnabled = $values['previewEnabled'] ?? null;
        $this->structuredOutputId = $values['structuredOutputId'] ?? null;
        $this->structuredOutput = $values['structuredOutput'] ?? null;
        $this->callIds = $values['callIds'];
    }
}
