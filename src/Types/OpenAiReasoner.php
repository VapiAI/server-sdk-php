<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class OpenAiReasoner extends JsonSerializableType
{
    /**
     * @var ?value-of<OpenAiReasonerProvider> $provider The reasoner uses OpenAI. Omit to use OpenAI.
     */
    #[JsonProperty('provider')]
    public ?string $provider;

    /**
     * @var ?value-of<OpenAiReasonerModel> $model The delegated reasoning model. Omit to use GPT-5.6 Terra.
     */
    #[JsonProperty('model')]
    public ?string $model;

    /**
     * @var ?value-of<OpenAiReasonerReasoningEffort> $reasoningEffort Higher effort can increase response time. Omit to use low.
     */
    #[JsonProperty('reasoningEffort')]
    public ?string $reasoningEffort;

    /**
     * Complete reasoner instructions. An explicit empty string is preserved.
     * Omit to use Vapi's default reasoner instructions. No behavioral instructions
     * are appended unless skills are configured; skill loading guidance and active
     * skill content are then composed with these instructions.
     *
     * @var ?string $instructions
     */
    #[JsonProperty('instructions')]
    public ?string $instructions;

    /**
     * @var ?array<OpenAiReasonerSkill> $skills Inline skills whose instructions and tools the GPT-Live reasoner loads on demand.
     */
    #[JsonProperty('skills'), ArrayType([OpenAiReasonerSkill::class])]
    public ?array $skills;

    /**
     * @param array{
     *   provider?: ?value-of<OpenAiReasonerProvider>,
     *   model?: ?value-of<OpenAiReasonerModel>,
     *   reasoningEffort?: ?value-of<OpenAiReasonerReasoningEffort>,
     *   instructions?: ?string,
     *   skills?: ?array<OpenAiReasonerSkill>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->provider = $values['provider'] ?? null;
        $this->model = $values['model'] ?? null;
        $this->reasoningEffort = $values['reasoningEffort'] ?? null;
        $this->instructions = $values['instructions'] ?? null;
        $this->skills = $values['skills'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
