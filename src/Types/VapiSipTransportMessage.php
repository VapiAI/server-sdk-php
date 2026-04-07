<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class VapiSipTransportMessage extends JsonSerializableType
{
    /**
     * @var value-of<VapiSipTransportMessageSipVerb> $sipVerb This is the SIP verb to use. Must be one of INFO, MESSAGE, or NOTIFY.
     */
    #[JsonProperty('sipVerb')]
    public string $sipVerb;

    /**
     * @var ?array<string, mixed> $headers These are the headers to include with the SIP request.
     */
    #[JsonProperty('headers'), ArrayType(['string' => 'mixed'])]
    public ?array $headers;

    /**
     * @var ?string $body This is the body of the SIP request, if any.
     */
    #[JsonProperty('body')]
    public ?string $body;

    /**
     * @param array{
     *   sipVerb: value-of<VapiSipTransportMessageSipVerb>,
     *   headers?: ?array<string, mixed>,
     *   body?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sipVerb = $values['sipVerb'];
        $this->headers = $values['headers'] ?? null;
        $this->body = $values['body'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
