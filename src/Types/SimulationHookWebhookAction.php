<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationHookWebhookAction extends JsonSerializableType
{
    /**
     * @var value-of<SimulationHookWebhookActionType> $type
     */
    #[JsonProperty('type')]
    public string $type;

    /**
     * Optional server override for this hook action.
     * If omitted, runtime defaults may apply (e.g. org server).
     *
     * @var ?Server $server
     */
    #[JsonProperty('server')]
    public ?Server $server;

    /**
     * @var ?SimulationHookInclude $include Optional payload include controls.
     */
    #[JsonProperty('include')]
    public ?SimulationHookInclude $include;

    /**
     * @param array{
     *   type: value-of<SimulationHookWebhookActionType>,
     *   server?: ?Server,
     *   include?: ?SimulationHookInclude,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->server = $values['server'] ?? null;
        $this->include = $values['include'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
