<?php

namespace Vapi\TrafficAllocations\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\TrafficAllocations\Types\CreateTrafficAllocationDtoAllocationIntent;
use Vapi\Types\CreateTrafficAllocationTargetDto;
use Vapi\Core\Types\ArrayType;

class CreateTrafficAllocationDto extends JsonSerializableType
{
    /**
     * @var string $assistantId The assistant whose calls this allocation splits.
     */
    #[JsonProperty('assistantId')]
    public string $assistantId;

    /**
     * @var ?value-of<CreateTrafficAllocationDtoAllocationIntent> $allocationIntent 'explicit' splits calls across targets, and is inferred when targets is sent. 'follow-latest' sends every call to the newest published version and is how you stop splitting; it must be sent explicitly.
     */
    #[JsonProperty('allocationIntent')]
    public ?string $allocationIntent;

    /**
     * @var ?array<CreateTrafficAllocationTargetDto> $targets The versions to split calls across. Omit to stop splitting (with allocationIntent 'follow-latest'). Order in this array is the selection order (position).
     */
    #[JsonProperty('targets'), ArrayType([CreateTrafficAllocationTargetDto::class])]
    public ?array $targets;

    /**
     * @var ?string $expectedCurrentAllocationId Optional concurrency guard. Omit it and the write applies unconditionally (last write wins, matching every other Vapi update surface). Provide the id of the allocation you last read and the write applies only while that allocation is still governing; any mismatch is a 409 carrying the actual current id.
     */
    #[JsonProperty('expectedCurrentAllocationId')]
    public ?string $expectedCurrentAllocationId;

    /**
     * @var ?string $description An optional note explaining why you made this change.
     */
    #[JsonProperty('description')]
    public ?string $description;

    /**
     * @param array{
     *   assistantId: string,
     *   allocationIntent?: ?value-of<CreateTrafficAllocationDtoAllocationIntent>,
     *   targets?: ?array<CreateTrafficAllocationTargetDto>,
     *   expectedCurrentAllocationId?: ?string,
     *   description?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantId = $values['assistantId'];
        $this->allocationIntent = $values['allocationIntent'] ?? null;
        $this->targets = $values['targets'] ?? null;
        $this->expectedCurrentAllocationId = $values['expectedCurrentAllocationId'] ?? null;
        $this->description = $values['description'] ?? null;
    }
}
