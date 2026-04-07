<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class SimulationHookCallEnded extends JsonSerializableType
{
    /**
     * @var array<SimulationHookWebhookAction> $do
     */
    #[JsonProperty('do'), ArrayType([SimulationHookWebhookAction::class])]
    public array $do;

    /**
     * @param array{
     *   do: array<SimulationHookWebhookAction>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->do = $values['do'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
