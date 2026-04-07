<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class TextContent extends JsonSerializableType
{
    /**
     * @var value-of<TextContentType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @var string $text
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var value-of<TextContentLanguage> $language
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
