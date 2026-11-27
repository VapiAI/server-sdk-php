<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CreateWebCallDto extends JsonSerializableType
{
    /**
     * This is the assistant version to use for this call. Supported only with
     * direct `assistantId`. Omit to follow the latest version.
     *
     * @var ?string $assistantVersion
     */
    #[JsonProperty('assistantVersion')]
    public ?string $assistantVersion;

    /**
     * This is the squad version to use for this call. Supported only with
     * direct `squadId`. Omit to follow the latest version.
     *
     * @var ?string $squadVersion
     */
    #[JsonProperty('squadVersion')]
    public ?string $squadVersion;

    /**
     * @var ?bool $roomDeleteOnUserLeaveEnabled
     */
    #[JsonProperty('roomDeleteOnUserLeaveEnabled')]
    public ?bool $roomDeleteOnUserLeaveEnabled;

    /**
     * This determines who starts the video recording. Only applies when video
     * recording is enabled (`artifactPlan.videoRecordingEnabled`).
     *
     * - `client`: the web client starts the recording when it joins.
     * - `server`: Vapi starts the recording once when the user first joins, so a
     *   weak client connection can't stop it from starting. The returned
     *   `transport.callToken` doesn't start the recording, and the client should
     *   not start it either. If Vapi can't set up the server-side start, no token
     *   is returned. If the start itself fails, the client is told during the
     *   call.
     *
     * Defaults to `client`.
     *
     * @var ?value-of<CreateWebCallDtoVideoRecordingStartMode> $videoRecordingStartMode
     */
    #[JsonProperty('videoRecordingStartMode')]
    public ?string $videoRecordingStartMode;

    /**
     * This is the assistant ID that will be used for the call. To use a transient assistant, use `assistant` instead.
     *
     * To start a call with:
     * - Assistant, use `assistantId` or `assistant`
     * - Squad, use `squadId` or `squad`
     * - Workflow, use `workflowId` or `workflow`
     *
     * @var ?string $assistantId
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * This is the assistant that will be used for the call. To use an existing assistant, use `assistantId` instead.
     *
     * To start a call with:
     * - Assistant, use `assistant`
     * - Squad, use `squad`
     * - Workflow, use `workflow`
     *
     * @var ?TransientAssistantDto $assistant
     */
    #[JsonProperty('assistant')]
    public ?TransientAssistantDto $assistant;

    /**
     * @var ?AssistantOverrides $assistantOverrides These are the overrides for the `assistant` or `assistantId`'s settings and template variables.
     */
    #[JsonProperty('assistantOverrides')]
    public ?AssistantOverrides $assistantOverrides;

    /**
     * This is the squad that will be used for the call. To use a transient squad, use `squad` instead.
     *
     * To start a call with:
     * - Assistant, use `assistant` or `assistantId`
     * - Squad, use `squad` or `squadId`
     * - Workflow, use `workflow` or `workflowId`
     *
     * @var ?string $squadId
     */
    #[JsonProperty('squadId')]
    public ?string $squadId;

    /**
     * This is a squad that will be used for the call. To use an existing squad, use `squadId` instead.
     *
     * To start a call with:
     * - Assistant, use `assistant` or `assistantId`
     * - Squad, use `squad` or `squadId`
     * - Workflow, use `workflow` or `workflowId`
     *
     * @var ?CreateSquadDto $squad
     */
    #[JsonProperty('squad')]
    public ?CreateSquadDto $squad;

    /**
     * These are the overrides for the `squad` or `squadId`'s member settings and template variables.
     * This will apply to all members of the squad.
     *
     * @var ?AssistantOverrides $squadOverrides
     */
    #[JsonProperty('squadOverrides')]
    public ?AssistantOverrides $squadOverrides;

    /**
     * This is the workflow that will be used for the call. To use a transient workflow, use `workflow` instead.
     *
     * To start a call with:
     * - Assistant, use `assistant` or `assistantId`
     * - Squad, use `squad` or `squadId`
     * - Workflow, use `workflow` or `workflowId`
     *
     * @var ?string $workflowId
     */
    #[JsonProperty('workflowId')]
    public ?string $workflowId;

    /**
     * This is a workflow that will be used for the call. To use an existing workflow, use `workflowId` instead.
     *
     * To start a call with:
     * - Assistant, use `assistant` or `assistantId`
     * - Squad, use `squad` or `squadId`
     * - Workflow, use `workflow` or `workflowId`
     *
     * @var ?CreateWorkflowDto $workflow
     */
    #[JsonProperty('workflow')]
    public ?CreateWorkflowDto $workflow;

    /**
     * @var ?WorkflowOverrides $workflowOverrides These are the overrides for the `workflow` or `workflowId`'s settings and template variables.
     */
    #[JsonProperty('workflowOverrides')]
    public ?WorkflowOverrides $workflowOverrides;

    /**
     * @param array{
     *   assistantVersion?: ?string,
     *   squadVersion?: ?string,
     *   roomDeleteOnUserLeaveEnabled?: ?bool,
     *   videoRecordingStartMode?: ?value-of<CreateWebCallDtoVideoRecordingStartMode>,
     *   assistantId?: ?string,
     *   assistant?: ?TransientAssistantDto,
     *   assistantOverrides?: ?AssistantOverrides,
     *   squadId?: ?string,
     *   squad?: ?CreateSquadDto,
     *   squadOverrides?: ?AssistantOverrides,
     *   workflowId?: ?string,
     *   workflow?: ?CreateWorkflowDto,
     *   workflowOverrides?: ?WorkflowOverrides,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->assistantVersion = $values['assistantVersion'] ?? null;
        $this->squadVersion = $values['squadVersion'] ?? null;
        $this->roomDeleteOnUserLeaveEnabled = $values['roomDeleteOnUserLeaveEnabled'] ?? null;
        $this->videoRecordingStartMode = $values['videoRecordingStartMode'] ?? null;
        $this->assistantId = $values['assistantId'] ?? null;
        $this->assistant = $values['assistant'] ?? null;
        $this->assistantOverrides = $values['assistantOverrides'] ?? null;
        $this->squadId = $values['squadId'] ?? null;
        $this->squad = $values['squad'] ?? null;
        $this->squadOverrides = $values['squadOverrides'] ?? null;
        $this->workflowId = $values['workflowId'] ?? null;
        $this->workflow = $values['workflow'] ?? null;
        $this->workflowOverrides = $values['workflowOverrides'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
