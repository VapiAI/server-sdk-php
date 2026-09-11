<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class UpdateSlackWebhookCredentialDto extends JsonSerializableType
{
    /**
     * @var ?value-of<UpdateSlackWebhookCredentialDtoProvider> $provider
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?string $webhookUrl Slack incoming webhook URL. See https://api.slack.com/messaging/webhooks for setup instructions. This is not returned in the API.
     */
    #[JsonProperty('webhookUrl')]
    public ?string $webhookUrl;

    /**
     * @var ?string $name This is the name of credential. This is just for your reference.
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @param array{
     *   provider?: ?value-of<UpdateSlackWebhookCredentialDtoProvider>,
     *   webhookUrl?: ?string,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->webhookUrl = $values['webhookUrl'] ?? null;
        $this->name = $values['name'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
