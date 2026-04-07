<?php

namespace Vapi\PhoneNumbers\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\PhoneNumbers\Types\UpdatePhoneNumbersRequestBody;

class UpdatePhoneNumbersRequest extends JsonSerializableType
{
    /**
     * @var UpdatePhoneNumbersRequestBody $body
     */
    public UpdatePhoneNumbersRequestBody $body;

    /**
     * @param array{
     *   body: UpdatePhoneNumbersRequestBody,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
