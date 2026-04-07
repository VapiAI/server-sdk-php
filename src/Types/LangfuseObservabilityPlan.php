<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class LangfuseObservabilityPlan extends JsonSerializableType
{
    /**
     * @var value-of<LangfuseObservabilityPlanProvider> $provider
     */
    #[JsonProperty('provider')]
    public string $provider;

    /**
     * @var ?string $promptName The name of a Langfuse prompt to link generations to. This enables tracking which prompt version was used for each generation. https://langfuse.com/docs/prompt-management/features/link-to-traces
     */
    #[JsonProperty('promptName')]
    public ?string $promptName;

    /**
     * @var ?float $promptVersion The version number of the Langfuse prompt to link generations to. Used together with promptName to identify the exact prompt version. https://langfuse.com/docs/prompt-management/features/link-to-traces
     */
    #[JsonProperty('promptVersion')]
    public ?float $promptVersion;

    /**
     * Custom name for the Langfuse trace. Supports Liquid templates.
     *
     * Available variables:
     * - {{ call.id }} - Call UUID
     * - {{ call.type }} - 'inboundPhoneCall', 'outboundPhoneCall', 'webCall'
     * - {{ assistant.name }} - Assistant name
     * - {{ assistant.id }} - Assistant ID
     *
     * Example: "{{ assistant.name }} - {{ call.type }}"
     *
     * Defaults to call ID if not provided.
     *
     * @var ?string $traceName
     */
    #[JsonProperty('traceName')]
    public ?string $traceName;

    /**
     * @var array<string> $tags This is an array of tags to be added to the Langfuse trace. Tags allow you to categorize and filter traces. https://langfuse.com/docs/tracing-features/tags
     */
    #[JsonProperty('tags'), ArrayType(['string'])]
    public array $tags;

    /**
     * This is a JSON object that will be added to the Langfuse trace. Traces can be enriched with metadata to better understand your users, application, and experiments. https://langfuse.com/docs/tracing-features/metadata
     * By default it includes the call metadata, assistant metadata, and assistant overrides.
     *
     * @var ?array<string, mixed> $metadata
     */
    #[JsonProperty('metadata'), ArrayType(['string' => 'mixed'])]
    public ?array $metadata;

    /**
     * @param array{
     *   provider: value-of<LangfuseObservabilityPlanProvider>,
     *   tags: array<string>,
     *   promptName?: ?string,
     *   promptVersion?: ?float,
     *   traceName?: ?string,
     *   metadata?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->provider = $values['provider'];
        $this->promptName = $values['promptName'] ?? null;
        $this->promptVersion = $values['promptVersion'] ?? null;
        $this->traceName = $values['traceName'] ?? null;
        $this->tags = $values['tags'];
        $this->metadata = $values['metadata'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
