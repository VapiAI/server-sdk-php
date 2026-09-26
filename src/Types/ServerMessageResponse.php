<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\Union;

class ServerMessageResponse extends JsonSerializableType
{
    /**
     * This is the response that is expected from the server to the message.
     *
     * Note: Most messages don't expect a response. Only "assistant-request", "tool-calls" and "transfer-destination-request" do.
     *
     * @var (
     *    ServerMessageResponseAssistantRequest
     *   |ServerMessageResponseHandoffDestinationRequest
     *   |ServerMessageResponseKnowledgeBaseRequest
     *   |ServerMessageResponseToolCalls
     *   |ServerMessageResponseTransferDestinationRequest
     *   |ServerMessageResponseVoiceRequest
     *   |ServerMessageResponseCallEndpointingRequest
     *   |ServerMessageResponseCampaignPredial
     * ) $messageResponse
     */
    #[JsonProperty('messageResponse'), Union(ServerMessageResponseAssistantRequest::class, ServerMessageResponseHandoffDestinationRequest::class, ServerMessageResponseKnowledgeBaseRequest::class, ServerMessageResponseToolCalls::class, ServerMessageResponseTransferDestinationRequest::class, ServerMessageResponseVoiceRequest::class, ServerMessageResponseCallEndpointingRequest::class, ServerMessageResponseCampaignPredial::class)]
    public ServerMessageResponseAssistantRequest|ServerMessageResponseHandoffDestinationRequest|ServerMessageResponseKnowledgeBaseRequest|ServerMessageResponseToolCalls|ServerMessageResponseTransferDestinationRequest|ServerMessageResponseVoiceRequest|ServerMessageResponseCallEndpointingRequest|ServerMessageResponseCampaignPredial $messageResponse;

    /**
     * @param array{
     *   messageResponse: (
     *    ServerMessageResponseAssistantRequest
     *   |ServerMessageResponseHandoffDestinationRequest
     *   |ServerMessageResponseKnowledgeBaseRequest
     *   |ServerMessageResponseToolCalls
     *   |ServerMessageResponseTransferDestinationRequest
     *   |ServerMessageResponseVoiceRequest
     *   |ServerMessageResponseCallEndpointingRequest
     *   |ServerMessageResponseCampaignPredial
     * ),
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->messageResponse = $values['messageResponse'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
