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
     * @var value-of<ModelDeprecationNoticeReplacementStatus> $replacementStatus Whether a replacement can be recommended for this configuration.
     */
    #[JsonProperty('replacementStatus')]
    public string $replacementStatus;

    /**
     * Recommended model when replacementStatus is available. Omitted when
     * eligibility cannot be established or no eligible replacement exists.
     * A recommendation reflects the response-time decision; it neither
     * confirms a completed swap nor authorizes a future execution.
     *
     * @var ?string $replacementModel
     */
    #[JsonProperty('replacementModel')]
    public ?string $replacementModel;

    /**
     * @param array{
     *   slot: string,
     *   provider: string,
     *   model: string,
     *   deprecationDate: string,
     *   retirementDate: string,
     *   replacementStatus: value-of<ModelDeprecationNoticeReplacementStatus>,
     *   replacementModel?: ?string,
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
        $this->replacementStatus = $values['replacementStatus'];
        $this->replacementModel = $values['replacementModel'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
