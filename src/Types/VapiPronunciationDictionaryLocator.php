<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Identifies a pronunciation dictionary and optional version used for voice synthesis.
 */
class VapiPronunciationDictionaryLocator extends JsonSerializableType
{
    /**
     * @var string $pronunciationDictId The pronunciation dictionary ID
     */
    #[JsonProperty('pronunciationDictId')]
    public string $pronunciationDictId;

    /**
     * @var ?string $versionId Version ID (only used by ElevenLabs, ignored for Cartesia)
     */
    #[JsonProperty('versionId')]
    public ?string $versionId;

    /**
     * @var ?value-of<VapiPronunciationDictionaryLocatorProvider> $provider Provider that hosts this pronunciation dictionary
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @param array{
     *   pronunciationDictId: string,
     *   versionId?: ?string,
     *   provider?: ?value-of<VapiPronunciationDictionaryLocatorProvider>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pronunciationDictId = $values['pronunciationDictId'];
        $this->versionId = $values['versionId'] ?? null;
        $this->provider = $values['provider'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
