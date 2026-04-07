<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CustomVoice extends JsonSerializableType
{
    /**
     * @var ?bool $cachingEnabled This is the flag to toggle voice caching for the assistant.
     */
    #[JsonProperty('cachingEnabled')]
    public ?bool $cachingEnabled;

    /**
     * @var ?string $voiceId This is the provider-specific ID that will be used. This is passed in the voice request payload to identify the voice to use.
     */
    #[JsonProperty('voiceId')]
    public ?string $voiceId;

    /**
     * @var ?ChunkPlan $chunkPlan This is the plan for chunking the model output before it is sent to the voice provider.
     */
    #[JsonProperty('chunkPlan')]
    public ?ChunkPlan $chunkPlan;

    /**
     * This is where the voice request will be sent.
     *
     * Request Example:
     *
     * POST https://{server.url}
     * Content-Type: application/json
     *
     * {
     *   "message": {
     *     "type": "voice-request",
     *     "text": "Hello, world!",
     *     "sampleRate": 24000,
     *     ...other metadata about the call...
     *   }
     * }
     *
     * Response Expected: 1-channel 16-bit raw PCM audio at the sample rate specified in the request. Here is how the response will be piped to the transport:
     * ```
     * response.on('data', (chunk: Buffer) => {
     *   outputStream.write(chunk);
     * });
     * ```
     *
     * @var Server $server
     */
    #[JsonProperty('server')]
    public Server $server;

    /**
     * @var ?FallbackPlan $fallbackPlan This is the plan for voice provider fallbacks in the event that the primary voice provider fails.
     */
    #[JsonProperty('fallbackPlan')]
    public ?FallbackPlan $fallbackPlan;

    /**
     * @param array{
     *   server: Server,
     *   cachingEnabled?: ?bool,
     *   voiceId?: ?string,
     *   chunkPlan?: ?ChunkPlan,
     *   fallbackPlan?: ?FallbackPlan,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->cachingEnabled = $values['cachingEnabled'] ?? null;
        $this->voiceId = $values['voiceId'] ?? null;
        $this->chunkPlan = $values['chunkPlan'] ?? null;
        $this->server = $values['server'];
        $this->fallbackPlan = $values['fallbackPlan'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
