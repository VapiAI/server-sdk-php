<?php

namespace Vapi\Campaigns\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Types\UpdateCampaignDto;

class CampaignControllerUpdateRequest extends JsonSerializableType
{
    /**
     * @var UpdateCampaignDto $body
     */
    public UpdateCampaignDto $body;

    /**
     * @param array{
     *   body: UpdateCampaignDto,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->body = $values['body'];
    }
}
