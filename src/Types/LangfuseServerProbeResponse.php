<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class LangfuseServerProbeResponse extends JsonSerializableType
{
    /**
     * @var bool $reachable Whether {apiUrl}/api/public/health answered at all.
     */
    #[JsonProperty('reachable')]
    public bool $reachable;

    /**
     * @var ?string $serverVersion The exact version the server reported, e.g. 3.63.0. Absent when the destination answered without one (proxies, adapters) or not at all.
     */
    #[JsonProperty('serverVersion')]
    public ?string $serverVersion;

    /**
     * @var ?string $blockedMessage Why the URL was refused without being contacted (a private address, plaintext http). Absent for a destination that was merely unreachable: supplying the version yourself applies there, but not here, because saving would refuse the URL with this same reason.
     */
    #[JsonProperty('blockedMessage')]
    public ?string $blockedMessage;

    /**
     * @param array{
     *   reachable: bool,
     *   serverVersion?: ?string,
     *   blockedMessage?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reachable = $values['reachable'];
        $this->serverVersion = $values['serverVersion'] ?? null;
        $this->blockedMessage = $values['blockedMessage'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
