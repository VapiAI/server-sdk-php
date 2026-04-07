<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use DateTime;
use Vapi\Core\Types\Date;

class SimulationConcurrencyResponse extends JsonSerializableType
{
    /**
     * @var string $orgId
     */
    #[JsonProperty('orgId')]
    public string $orgId;

    /**
     * @var float $concurrencyLimit Max call slots for simulations (each voice simulation uses 2 call slots: tester + target)
     */
    #[JsonProperty('concurrencyLimit')]
    public float $concurrencyLimit;

    /**
     * @var float $activeSimulations Number of call slots currently in use by running simulations
     */
    #[JsonProperty('activeSimulations')]
    public float $activeSimulations;

    /**
     * @var float $availableToStart Number of voice simulations that can start now (available call slots / 2)
     */
    #[JsonProperty('availableToStart')]
    public float $availableToStart;

    /**
     * @var ?DateTime $createdAt
     */
    #[JsonProperty('createdAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $createdAt;

    /**
     * @var ?DateTime $updatedAt
     */
    #[JsonProperty('updatedAt'), Date(Date::TYPE_DATETIME)]
    public ?DateTime $updatedAt;

    /**
     * @var bool $isDefault True if org is using platform default concurrency limit
     */
    #[JsonProperty('isDefault')]
    public bool $isDefault;

    /**
     * @param array{
     *   orgId: string,
     *   concurrencyLimit: float,
     *   activeSimulations: float,
     *   availableToStart: float,
     *   isDefault: bool,
     *   createdAt?: ?DateTime,
     *   updatedAt?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->orgId = $values['orgId'];
        $this->concurrencyLimit = $values['concurrencyLimit'];
        $this->activeSimulations = $values['activeSimulations'];
        $this->availableToStart = $values['availableToStart'];
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->isDefault = $values['isDefault'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
