<?php

namespace Vapi\TrafficAllocations\Requests;

use Vapi\Core\Json\JsonSerializableType;

class TrafficAllocationControllerLatestGetRequest extends JsonSerializableType
{
    /**
     * @var string $assistantId The assistant whose latest allocation to return.
     */
    public string $assistantId;

    /**
     * @param array{
     *   assistantId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantId = $values['assistantId'];
    }
}
