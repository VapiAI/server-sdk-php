<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ResponseCompletedEvent extends JsonSerializableType
{
    /**
     * @var ResponseObject $response The completed response
     */
    #[JsonProperty('response')]
    public ResponseObject $response;

    /**
     * @var value-of<ResponseCompletedEventType> $type Event type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * @param array{
     *   response: ResponseObject,
     *   type: value-of<ResponseCompletedEventType>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->response = $values['response'];
        $this->type = $values['type'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
