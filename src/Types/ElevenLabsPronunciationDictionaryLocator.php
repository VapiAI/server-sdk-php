<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Identifies a specific version of an ElevenLabs pronunciation dictionary.
 */
class ElevenLabsPronunciationDictionaryLocator extends JsonSerializableType
{
    /**
     * @var string $pronunciationDictionaryId This is the ID of the pronunciation dictionary to use.
     */
    #[JsonProperty('pronunciationDictionaryId')]
    public string $pronunciationDictionaryId;

    /**
     * This is the version ID of the pronunciation dictionary to use.
     *
     * Omit to use the dictionary's latest version.
     *
     * @var ?string $versionId
     */
    #[JsonProperty('versionId')]
    public ?string $versionId;

    /**
     * @param array{
     *   pronunciationDictionaryId: string,
     *   versionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pronunciationDictionaryId = $values['pronunciationDictionaryId'];
        $this->versionId = $values['versionId'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
