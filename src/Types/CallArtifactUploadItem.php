<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallArtifactUploadItem extends JsonSerializableType
{
    /**
     * @var value-of<CallArtifactUploadItemType> $type The artifact this result refers to.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var bool $success Whether this artifact was stored successfully in your own configured storage.
     */
    #[JsonProperty('success')]
    public bool $success;

    /**
     * @param array{
     *   type: value-of<CallArtifactUploadItemType>,
     *   success: bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->success = $values['success'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
