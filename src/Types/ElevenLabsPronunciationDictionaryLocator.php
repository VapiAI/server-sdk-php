<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ElevenLabsPronunciationDictionaryLocator extends JsonSerializableType
{
    /**
     * @var string $pronunciationDictionaryId This is the ID of the pronunciation dictionary to use.
     */
    #[JsonProperty('pronunciationDictionaryId')]
    public string $pronunciationDictionaryId;

    /**
     * @var string $versionId This is the version ID of the pronunciation dictionary to use.
     */
    #[JsonProperty('versionId')]
    public string $versionId;

    /**
     * @param array{
     *   pronunciationDictionaryId: string,
     *   versionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pronunciationDictionaryId = $values['pronunciationDictionaryId'];
        $this->versionId = $values['versionId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
