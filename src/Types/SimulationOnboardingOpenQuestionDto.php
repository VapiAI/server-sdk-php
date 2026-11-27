<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class SimulationOnboardingOpenQuestionDto extends JsonSerializableType
{
    /**
     * @var string $id Question id within its draft, e.g. `Q1`.
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $text A question about expected assistant behavior that needs clarification.
     */
    #[JsonProperty('text')]
    public string $text;

    /**
     * @var string $why Which requirement the answer changes, and how.
     */
    #[JsonProperty('why')]
    public string $why;

    /**
     * @param array{
     *   id: string,
     *   text: string,
     *   why: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->text = $values['text'];
        $this->why = $values['why'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
