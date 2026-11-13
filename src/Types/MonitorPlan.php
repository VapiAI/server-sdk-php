<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

/**
 * Controls real-time listening and control for assistant calls, authentication requirements for monitor URLs, and attached monitors.
 */
class MonitorPlan extends JsonSerializableType
{
    /**
     * This determines whether the assistant's calls allow live listening. Defaults to true.
     *
     * Fetch `call.monitor.listenUrl` to get the live listening URL.
     *
     * @default true
     *
     * @var ?bool $listenEnabled
     */
    #[JsonProperty('listenEnabled')]
    public ?bool $listenEnabled;

    /**
     * This enables authentication on the `call.monitor.listenUrl`.
     *
     * If `listenAuthenticationEnabled` is `true`, the `call.monitor.listenUrl` will require an `Authorization: Bearer <vapi-public-api-key>` header.
     *
     * @default false
     *
     * @var ?bool $listenAuthenticationEnabled
     */
    #[JsonProperty('listenAuthenticationEnabled')]
    public ?bool $listenAuthenticationEnabled;

    /**
     * This determines whether the assistant's calls allow live control. Defaults to true.
     *
     * Fetch `call.monitor.controlUrl` to get the live control URL.
     *
     * To use, send any control message via a POST request to `call.monitor.controlUrl`. Here are the types of controls supported: https://docs.vapi.ai/api-reference/messages/client-inbound-message
     *
     * @default true
     *
     * @var ?bool $controlEnabled
     */
    #[JsonProperty('controlEnabled')]
    public ?bool $controlEnabled;

    /**
     * This enables authentication on the `call.monitor.controlUrl`.
     *
     * If `controlAuthenticationEnabled` is `true`, the `call.monitor.controlUrl` will require an `Authorization: Bearer <vapi-public-api-key>` header.
     *
     * @default false
     *
     * @var ?bool $controlAuthenticationEnabled
     */
    #[JsonProperty('controlAuthenticationEnabled')]
    public ?bool $controlAuthenticationEnabled;

    /**
     * @var ?array<string> $monitorIds IDs of the monitors attached to the assistant. Use this field for transient assistants or to update the monitors attached to an existing assistant. Defaults to an empty array.
     */
    #[JsonProperty('monitorIds'), ArrayType(['string'])]
    public ?array $monitorIds;

    /**
     * @param array{
     *   listenEnabled?: ?bool,
     *   listenAuthenticationEnabled?: ?bool,
     *   controlEnabled?: ?bool,
     *   controlAuthenticationEnabled?: ?bool,
     *   monitorIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->listenEnabled = $values['listenEnabled'] ?? null;
        $this->listenAuthenticationEnabled = $values['listenAuthenticationEnabled'] ?? null;
        $this->controlEnabled = $values['controlEnabled'] ?? null;
        $this->controlAuthenticationEnabled = $values['controlAuthenticationEnabled'] ?? null;
        $this->monitorIds = $values['monitorIds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
