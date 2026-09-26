<?php

namespace Vapi\Assistants\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ValidateBackgroundSoundUrlDto extends JsonSerializableType
{
    /**
     * @var string $url This is the background sound URL to validate. The server performs a ranged request and checks that the URL serves a live media file.
     */
    #[JsonProperty('url')]
    public string $url;

    /**
     * @param array{
     *   url: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->url = $values['url'];
    }
}
