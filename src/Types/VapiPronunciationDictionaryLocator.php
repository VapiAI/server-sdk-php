<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class VapiPronunciationDictionaryLocator extends JsonSerializableType
{
    /**
     * @var string $pronunciationDictId The pronunciation dictionary ID
     */
    #[JsonProperty('pronunciationDictId')]
    public string $pronunciationDictId;

    /**
     * @var ?string $versionId Version ID (only required for ElevenLabs, ignored for Cartesia)
     */
    #[JsonProperty('versionId')]
    public ?string $versionId;

    /**
     * @param array{
     *   pronunciationDictId: string,
     *   versionId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pronunciationDictId = $values['pronunciationDictId'];
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
