<?php

namespace Vapi\SimulationSuites\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Types\SimulationOnboardingRequirementsDraftDto;

class SimulationOnboardingRequirementsCreateDto extends JsonSerializableType
{
    /**
     * @var string $assistantId Assistant to draft requirements for.
     */
    #[JsonProperty('assistantId')]
    public string $assistantId;

    /**
     * @var ?SimulationOnboardingRequirementsDraftDto $previousDraft The draft being revised, exactly as this endpoint returned it. Send it with `feedback`.
     */
    #[JsonProperty('previousDraft')]
    public ?SimulationOnboardingRequirementsDraftDto $previousDraft;

    /**
     * @var ?string $feedback Natural-language instructions for revising the requirements in `previousDraft`, including answers to open questions. Required when `previousDraft` is provided.
     */
    #[JsonProperty('feedback')]
    public ?string $feedback;

    /**
     * @param array{
     *   assistantId: string,
     *   previousDraft?: ?SimulationOnboardingRequirementsDraftDto,
     *   feedback?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->assistantId = $values['assistantId'];
        $this->previousDraft = $values['previousDraft'] ?? null;
        $this->feedback = $values['feedback'] ?? null;
    }
}
