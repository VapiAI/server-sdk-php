<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Localized text content used as a language-specific message variant.
 */
class TextContent extends JsonSerializableType
{
    /**
     * @var value-of<TextContentType> $type Selects text as the content type.
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $text Text spoken or displayed for this content variant.
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var value-of<TextContentLanguage> $language Language code associated with this text variant.
     */
    #[JsonProperty('language')]
    public string $language;

    /**
     * @param array{
     *   type: value-of<TextContentType>,
     *   text: string,
     *   language: value-of<TextContentLanguage>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->text = $values['text'];
        $this->language = $values['language'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
