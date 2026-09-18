<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class ModelDeprecationNotice extends JsonSerializableType
{
    /**
     * Path of the slot that carries the model, relative to the response root,
     * e.g. `model`, `model.fallbackModels[1]`, `transcriber`, `voice`, or
     * `members[2].assistantOverrides.model` on a squad.
     *
     * @var string $slot
     */
    #[JsonProperty('slot')]
    public string $slot;

    /**
     * @var string $provider Provider as stored on the slot.
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var string $model Model name as stored on the slot.
     */
    #[JsonProperty('model')]
    public string $model;

    /**
     * @var string $deprecationDate Day the model became deprecated, `YYYY-MM-DD` in UTC.
     */
    #[JsonProperty('deprecationDate')]
    public string $deprecationDate;

    /**
     * Day the model is or was retired, `YYYY-MM-DD` in UTC. On and after this
     * day Vapi no longer runs the model as configured.
     *
     * @var string $retirementDate
     */
    #[JsonProperty('retirementDate')]
    public string $retirementDate;

    /**
     * The recommended migration target for the slot's model: the registry's
     * replacement, followed through any further retirements as of the response
     * date, so it names a model that is alive on that day. A `<model>:<region>`
     * pin on the slot's model is kept on the target.
     *
     * @var string $replacementModel
     */
    #[JsonProperty('replacementModel')]
    public string $replacementModel;

    /**
     * @param array{
     *   slot: string,
     *   provider: string,
     *   model: string,
     *   deprecationDate: string,
     *   retirementDate: string,
     *   replacementModel: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->slot = $values['slot'];
        $this->provider = $values['provider'];
        $this->model = $values['model'];
        $this->deprecationDate = $values['deprecationDate'];
        $this->retirementDate = $values['retirementDate'];
        $this->replacementModel = $values['replacementModel'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
