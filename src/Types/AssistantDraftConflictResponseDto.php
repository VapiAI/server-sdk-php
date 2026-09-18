<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class AssistantDraftConflictResponseDto extends JsonSerializableType
{
    /**
     * @var ?string $existingDraftId
     */
    #[JsonProperty('existingDraftId')]
    public ?string $existingDraftId;

    /**
     * @var string $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * @param array{
     *   error: string,
     *   message: string,
     *   existingDraftId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->existingDraftId = $values['existingDraftId'] ?? null;
        $this->error = $values['error'];
        $this->message = $values['message'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
