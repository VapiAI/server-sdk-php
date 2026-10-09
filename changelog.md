## [3.0.0] - 2026-10-09
### Breaking Changes
- **`TrieveKnowledgeBase`**, **`CreateTrieveKnowledgeBaseDto`**, **`UpdateTrieveKnowledgeBaseDto`**, and all related Trieve types (`TrieveKnowledgeBaseChunkPlan`, `TrieveKnowledgeBaseCreate`, `TrieveKnowledgeBaseSearchPlan`, and associated enums) have been removed. Remove any references to these classes from your code.
- **`VapiVoiceVoiceId`** and **`FallbackVapiVoiceVoiceId`** enums have been removed. Update any voice ID references to use the replacement types.
- **`VapiModelProvider`** and **`CreateCampaignDto`** classes have been removed. Update any usages accordingly.
- **`ByoSipTrunkCredential::$sbcConfiguration`** field has been removed. Remove any reads or writes of this property.
- **`CerebrasModelModel::Llama3370B`**, **`GroqModelModel::MetaLlamaLlama4Maverick17B128EInstruct`**, and **`EvalGroqModelModel::MetaLlamaLlama4Maverick17B128EInstruct`** enum cases have been removed. Switch to a supported model value.

### Added
- **`AssistantsClient::assistantControllerValidateBackgroundSoundUrl()`** — new method to validate a background sound URL, returning a `BackgroundSoundUrlValidationResult`.

### Breaking Changes
- **`UpdateAssistantDtoCredentialsItem::trieve()`**, **`isTrieve()`**, and **`asTrieve()`** have been removed. The `trieve` credential provider is no longer supported; remove any references to these methods.
- **`CreateCallDto::$transport`** type changed from `?array<string, mixed>` to `?CreateCallDtoTransport`. Replace raw array values with a `CreateCallDtoTransport` instance.

### Added
- **`UpdateAssistantDtoCredentialsItem::s3Compatible()`**, **`isS3Compatible()`**, and **`asS3Compatible()`** — new factory and accessor methods for the `s3-compatible` credential provider.
- **`UpdateAssistantDtoCredentialsItem::microsoft()`**, **`isMicrosoft()`**, and **`asMicrosoft()`** — new factory and accessor methods for the `microsoft` credential provider.
- **`CallsClient`** gains seven new call artifact download methods: `callArtifactControllerMonoRecordingDownload`, `callArtifactControllerStereoRecordingDownload`, `callArtifactControllerVideoRecordingDownload`, `callArtifactControllerCustomerRecordingDownload`, `callArtifactControllerAssistantRecordingDownload`, `callArtifactControllerPcapDownload`, and `callArtifactControllerCallLogsDownload`.
- **`CreateCallDto`** adds optional `assistantVersion` and `squadVersion` string fields to pin a specific assistant or squad version for a call.

### Breaking Changes
- **`CampaignsClient::campaignControllerUpdate`** now accepts a required `CampaignControllerUpdateRequest` wrapper instead of an optional `UpdateCampaignDto`. Update call sites to wrap the update payload in `CampaignControllerUpdateRequest`.
- **`UpdatePersonalityDto`** has been moved from the `Vapi\Types` namespace to `Vapi\SimulationPersonalities\Requests`. Update any `use` statements or class references accordingly.

### Added
- **v2 campaign methods** — `campaignControllerFindAllV2`, `campaignControllerCreateV2`, `campaignControllerFindOneV2`, `campaignControllerRemoveV2`, `campaignControllerUpdateV2`, and `campaignControllerGetCampaignV2Contacts` added to `CampaignsClient` for the new `/v2/campaign` endpoints.
- **`sortBy` field** added as an optional parameter to paginated request types across `CampaignsClient`, `EvalClient`, `InsightClient`, `ObservabilityScorecard`, and `ProviderResources` to control the sort column (defaults to `createdAt`).
- **`FilesClient::list`** now accepts an optional `ListFilesRequest` with a `purpose` filter; file upload now supports optional `purpose` and `metadata` body fields.
- **`InsightRunDto::$assistantId`** — new optional field for scoping dashboard insight runs to a specific assistant without mutating the saved insight.

### Breaking Changes
- **`AssistantCredentialsItem::trieve()`**, **`isTrieve()`**, and **`asTrieve()`** have been removed along with the `'trieve'` provider variant. Remove any code that constructs or inspects Trieve credentials via this union type.
- **`Artifact::$transfers`** element type changed from `string` to `TransferArtifact`. Update any code that reads transfer entries as plain strings to use the new `TransferArtifact` object instead.

### Added
- **`AssistantCredentialsItem::s3Compatible()`** and **`AssistantCredentialsItem::microsoft()`** — new factory methods (plus `isS3Compatible()`, `asS3Compatible()`, `isMicrosoft()`, `asMicrosoft()` accessors) for S3-compatible storage and Microsoft credential providers.
- **`Artifact`** gains eight presigned download URL fields (`presignedMonoUrl`, `presignedStereoUrl`, `presignedVideoUrl`, `presignedAssistantUrl`, `presignedCustomerUrl`, `presignedPcapUrl`, `presignedLogUrl`) with a shared `presignedUrlsExpiresAt` expiry timestamp, plus a new `skippedStructuredOutputs` map.
- **`AssemblyAiTranscriber`** adds `mode`, `prompt`, `agentContext`, `agentContextAutoUpdateEnabled`, and `languageCodes` fields for AssemblyAI Universal Pro speech models (`universal-3-5-pro` and `universal-3-6-pro`).
- **`Assistant`** adds `latestVersion` (the latest published version label) and `modelDeprecations` (read-only deprecation notices for models in use).

### Breaking Changes
- **`CreateTrieveCredentialDto`** has been removed along with the `trieve()` factory method and `isTrieve()`/`asTrieve()` accessors on `CreateAssistantDtoCredentialsItem` and `CreateWorkflowDtoCredentialsItem`. Remove any code that constructs or reads Trieve credentials.
- **`CreateSesameVoiceDto`** now requires `file`, `voiceName`, and `transcription` — all three were previously optional (or absent). Update all construction sites to pass all three fields; the constructor no longer accepts an empty array.
- **`CreateByoSipTrunkCredentialDto`** removes the `sbcConfiguration` field. Remove any references to `$sbcConfiguration` on this type.
- **`CreateOutboundCallDto::$transport`** type changed from `?array<string, mixed>` to `?CreateOutboundCallDtoTransport`. Replace raw array values with a `CreateOutboundCallDtoTransport` instance.

### Added
- **`CreateMicrosoftCredentialDto`** and **`CreateS3CompatibleCredentialDto`** are new credential types, with corresponding `microsoft()` / `s3Compatible()` factory methods and `isMicrosoft()` / `asM icrosoft()` / `isS3Compatible()` / `asS3Compatible()` accessors on credential union types.
- **`CreateOutboundCallDto::$assistantVersion`** and **`$squadVersion`** — new optional fields to pin a specific assistant or squad version for a call.
- **`CreateScenarioDto::$latencyExpectations`** — new optional field for defining per-turn latency ceilings on voice simulations.

### Added
- **`toolRefs`** — new optional `array<ToolRef>` field on `CustomLlmModel`, `DeepInfraModel`, and `DeepSeekModel` for version-pinned tool references; when the same tool appears in both `toolIds` and `toolRefs`, the `toolRefs` pin takes precedence.
- **`redaction`** and **`languages`** — new optional fields on `DeepgramTranscriber` and `FallbackDeepgramTranscriber` enabling transcript redaction (PCI, PII, PHI, numbers) and language hints for Flux Multilingual models.
- **`speed`** and **`expressivity`** — new optional float fields on `DeepgramVoice` for controlling playback speed and expressivity level on Aura-2 and Flux voices.
- **`mode`**, **`prompt`**, **`agentContext`**, **`agentContextAutoUpdateEnabled`**, and **`languageCodes`** — new optional fields on `FallbackAssemblyAiTranscriber` supporting AssemblyAI Universal Pro speech models (`universal-3-5-pro`, `universal-3-6-pro`).
- **`latestVersion`** on `DtmfTool` and `EndCallTool`; **`path`** on `EvaluationPlanItem`; **`triggerResetMode`** typed as an enum value on `CustomerSpeechTimeoutOptions`; `ElevenLabsPronunciationDictionaryLocator::$versionId` is now optional to allow using the dictionary's latest version.

### Changed
- **`DeepgramTranscriber`** and **`FallbackDeepgramTranscriber`** — `eagerEotThreshold` field has been removed; migrate by removing any references to this property.
- **`DeepgramVoice`** — default model documentation updated from `aura-2` to `aura`; temperature default across LLM model types updated from `0` to `0.5` in PHPDoc.

### Added
- **`FallbackDeepgramVoice::$speed`** and **`FallbackDeepgramVoice::$expressivity`** — new optional float fields for controlling speech speed and expressivity on Flux voices.
- **`FallbackVapiVoice::$version`** and **`FallbackVapiVoice::$language`** — new optional fields for selecting the Vapi voice generation and synthesis language.
- **`FallbackSonioxTranscriber`** — new optional fields `$languages`, `$endpointSensitivity`, `$endpointLatencyAdjustmentLevel`, `$contextGeneral`, and `$confidenceThreshold` for fine-grained transcription control.
- **`latestVersion`** — new optional string field added to all tool types (`FunctionTool`, `GhlTool`, `GoHighLevelCalendarAvailabilityTool`, `GoHighLevelCalendarEventCreateTool`, `GoHighLevelContactCreateTool`, `GoHighLevelContactGetTool`, `GoogleCalendarCheckAvailabilityTool`, `GoogleCalendarCreateEventTool`).
- **`GetEvalRunPaginatedDto::$sortBy`** and **`GetEvalRunPaginatedDto::$search`** — new optional fields for sorting and searching eval run listings.

### Changed
- **`FallbackGladiaTranscriber::$languages`** and **`GladiaTranscriber::$languages`** — type changed from `?string` to `?array<string>` to support multiple language codes; update any code passing a single string to wrap it in an array.
- **`FallbackTranscriberPlan::$transcribers`** — field is now nullable and the constructor `$values` parameter now defaults to an empty array, making construction without arguments valid.

### Added
- **`toolRefs`** — new optional `ToolRef[]` field on `GoogleModel`, `GroqModel`, `InflectionAiModel`, `MinimaxLlmModel`, `OpenAiModel`, and `OpenRouterModel` for version-pinned tool references; when the same `toolId` appears in both `toolIds` and `toolRefs`, the `toolRefs` pin takes precedence.
- **`latestVersion`** — new optional `string` field on `GoogleSheetsRowAppendTool`, `HandoffTool`, `MakeTool`, `McpTool`, and `OutputTool` exposing the tool's latest published version.
- **`OpenAiModel::$speaker`**, **`$reasoner`**, **`$serviceTier`**, and **`$reasoningEffort`** — new optional fields on `OpenAiModel` supporting GPT-Live speaker/reasoner configuration and OpenAI service-tier and reasoning-effort selection.
- **`MicrosoftCredential`** — new credential class (replacing `TrieveCredential`) with an optional `region` field for specifying the Azure Speech resource region.
- **`LineInsight::$systemKey`** — new optional `string` field exposing the stable server-owned identifier for system-created insights.

### Changed
- **`temperature` default** — documentation updated across all model types (`GoogleModel`, `GroqModel`, `InflectionAiModel`, `MinimaxLlmModel`, `OpenAiModel`, `OpenRouterModel`) to reflect a default of `0.5` instead of `0`.

### Added
- **`PaginationMeta`** gains optional `totalPages`, `hasNextPage`, `nextCursor`, and `sortOrder` fields to support keyset pagination without OFFSET scans.
- **`ServerMessage`** and **`ServerMessageResponse`** now accept `ServerMessageCallArtifactUpload`, `ServerMessageCampaignPredial`, and `ServerMessageResponseCampaignPredial` as new union variants.
- **`latestVersion`** optional field added to `QueryTool`, `SipRequestTool`, `SlackSendMessageTool`, and `SmsTool` for version-pinned tool references; `PerplexityAiModel` gains a matching `toolRefs` field.
- **`SimulationRunItemCounts`** gains optional `distinctSimulationTotal` and `distinctSimulationFailed` fields; **`SimulationRunItemResults`** gains an optional `latencyEvaluations` field.
- **`PieInsight`** gains an optional `systemKey` field identifying system-created insights.

### Changed
- **`ScorecardMetric::$conditions`** is now typed as `array<NumberComparatorScorecardMetricCondition|BooleanComparatorScorecardMetricCondition>` instead of `array<array<string, mixed>>` — update any code that constructs or reads raw map arrays.
- **`SayHookAction::$exact`** is now `string|array<string>|null` instead of `?array<string, mixed>` — update any code passing a generic map to pass a string or string array.
- **`RecordingConsent::$type`** is now a `string` (enum value) instead of `array<string, mixed>` — update any code that treated this field as an associative array.

### Breaking Changes
- **`WorkflowCredentialsItem::trieve()`**, **`isTrieve()`**, and **`asTrieve()`** have been removed along with the `'trieve'` provider variant. Update any code that constructs or inspects a `trieve` credential to use an alternative provider.
- **`WorkflowUserEditableCredentialsItem::trieve()`**, **`isTrieve()`**, and **`asTrieve()`** have been removed along with the `'trieve'` provider variant. Update any code that constructs or inspects a `trieve` credential to use an alternative provider.

### Added
- **`WorkflowCredentialsItem::s3Compatible()`** / **`isS3Compatible()`** / **`asS3Compatible()`** — new factory and accessor methods for the `'s3-compatible'` credential provider backed by `CreateS3CompatibleCredentialDto`.
- **`WorkflowCredentialsItem::microsoft()`** / **`isMicrosoft()`** / **`asMicrosoft()`** — new factory and accessor methods for the `'microsoft'` credential provider backed by `CreateMicrosoftCredentialDto`. The same additions apply to `WorkflowUserEditableCredentialsItem`.
- **`XaiModel::$toolRefs`** — new optional `?array<ToolRef>` field for pinning specific tool versions by `(toolId, version)` pair.
- **`sortBy` query parameter** — added to paginated list endpoints in `EvalClient`, `InsightClient`, `ObservabilityScorecardClient`, and `PhoneNumbersClient`.

### Breaking Changes
- **`CreateSimulationRunDtoSimulationsItem`** has moved from `Vapi\Types` to `Vapi\SimulationRuns\Types`. Update your `use` statements to `use Vapi\SimulationRuns\Types\CreateSimulationRunDtoSimulationsItem;`.
- **`CreateSimulationRunDtoTarget`** has moved from `Vapi\Types` to `Vapi\SimulationRuns\Types`. Update your `use` statements to `use Vapi\SimulationRuns\Types\CreateSimulationRunDtoTarget;`.
- **`UpdateScenarioDtoHooksItem`** has moved from `Vapi\Types` to `Vapi\SimulationScenarios\Types`. Update your `use` statements to `use Vapi\SimulationScenarios\Types\UpdateScenarioDtoHooksItem;`.

### Added
- **`sortBy`** query parameter on `ProviderResourcesClient` and `SessionsClient` paginated list methods for controlling sort field.
- **`squadOverrides`** and **`idAny`** filter parameters on `SessionsClient` list method; **`idAny`** also added to `SquadsClient` list method.

### Breaking Changes
- **`GladiaTranscriberLanguages`** has been renamed to `GladiaTranscriberLanguagesItem`. Update all references to use the new name.
- **`FallbackGladiaTranscriberLanguages`** has been renamed to `FallbackGladiaTranscriberLanguagesItem`. Update all references to use the new name.
- **`UpdateUserRoleDtoRole`** has been renamed to `InviteUserDtoRoleZero` and the `role` field on `InviteUserDto` now accepts `value-of<InviteUserDtoRoleZero>|string`. Update all references to use the new enum name.

### Added
- **`InviteUserDtoRoleZero::HipaaSpecial`** — new `hipaa-special` role value available when inviting users.
- **Class-level PHPDoc** added to `EvalRun`, `EvalRunPaginatedResponse`, `Eval_`, `File`, `FallbackCartesiaTranscriber`, `FallbackElevenLabsVoice`, `FallbackOpenAiVoice`, `FallbackSpeechmaticsTranscriber`, and many other types, providing concise descriptions of each class's purpose.

### Changed
- **`FallbackElevenLabsVoice`** field docs for `similarityBoost`, `style`, `useSpeakerBoost`, `speed`, `optimizeStreamingLatency`, `enableSsmlParsing`, and `autoMode` now note that these settings are ignored by `eleven_v4_turbo`.
- **`FallbackOpenAiVoice`** voice-availability documentation updated to reflect that `quartz`, `ripple`, `vesper`, and other new voices are only supported with GPT-Live models.

### Breaking Changes
- **`GhlToolType`** has been renamed to `UpdateGhlToolDtoType`. Update all references in your code to use the new enum name.
- **`UpdateCampaignDtoStatus`** has been moved from the `Vapi\Campaigns\Types` namespace to `Vapi\Types`. Update your `use` statements accordingly.

### Added
- **`UpdateCampaignDtoStatus::Cancelled`** — new `cancelled` case added to the campaign status enum.

### Added
- **`VapiModel`** provider support in `UpdateAssistantDtoModel` via new `vapi()` factory, `isVapi()`, and `asVapi()` methods.
- **`XaiTranscriber`** and **`VapiTranscriber`** provider support in `UpdateAssistantDtoTranscriber` via new factory and accessor methods.
- **`UpdateAssistantDtoServerMessagesItem::CallArtifactUpload`** — new enum case for the `call.artifact.upload` server message event.
- **`ValidateBackgroundSoundUrlDto`** — new request type for validating a background-sound URL against a live media endpoint.
- **`UpdateUserRoleDtoRoleZero`** — replaces `InviteUserDtoRole` with an expanded enum that includes the new `HipaaSpecial` role; `UpdateUserRoleDto::$role` now accepts any `string` in addition to the typed enum values.

### Added
- **`BoardClient`** — new client for managing reporting boards, supporting list, create, get, update, delete, and metrics-overview-ensure operations against the `/reporting/board` endpoints.
- **`XaiVoice` and `MicrosoftVoice` providers** — `UpdateAssistantDtoVoice` now supports `xai` and `microsoft` voice providers, with `isXai()`, `asXai()`, `isMicrosoft()`, and `asMicrosoft()` accessor methods.
- **`CreateCallDtoTransport`** — new discriminated union type for specifying call transport, supporting `vapi.websocket`, `vonage`, `twilio`, `vapi.sip`, `telnyx`, and `daily` providers.
- **`CreateBoardDto` and `UpdateBoardDto`** — new request types for creating and updating boards, including `items`, `name`, `layout`, and `timeRangeOverride` fields.
- **`BoardControllerFindAllRequest`** — new paginated list request type with filtering by `createdAt`/`updatedAt` ranges and sorting options.

### Added
- **V2 Campaign request classes** — `CampaignControllerFindAllV2Request`, `CampaignControllerFindOneV2Request`, `CampaignControllerGetCampaignV2ContactsRequest`, `CampaignControllerUpdateV2Request`, and `CampaignControllerUpdateRequest` support the new V2 campaign endpoints, including an optional `includeCounters` flag that attaches `contactCounters` and `callMetrics` to responses.
- **`ListFilesRequest`** — new request class for listing files, with an optional `purpose` filter (`assistant`, `composer-attachment`, `knowledge-base-v2`).
- **`purpose` and `metadata` fields on `CreateFileDto`** — optional fields that let callers tag uploaded files with a product purpose and attach JSON-encoded metadata.
- **`idAny` and `sortBy` fields on `ListChatsRequest`** — `idAny` accepts comma-separated chat IDs for multi-ID filtering; `sortBy` accepts `createdAt`, `duration`, or `cost` via the new `ListChatsRequestSortBy` enum.
- **New enum cases and sort-by enums** — `Cancelled` and `Archived` added to `CampaignControllerFindAllRequestStatus`; new `SortBy` enums added for Campaigns V2, Eval, and Insight list endpoints.

### Added
- **`KnowledgeBasesV2Client`** — new client for managing v2 knowledge bases, supporting create, list, get, update, delete, and file attach/detach/retry operations against the `v2/knowledge-base` endpoints.
- **`sortBy` field on list requests** — `PhoneNumberControllerFindAllPaginatedRequest`, `ListSessionsRequest`, and `PersonalityControllerFindAllRequest` now accept an optional `sortBy` parameter (values: `createdAt`, `duration`, `cost`) with corresponding `*SortBy` enums.
- **`squadOverrides` and `idAny` fields on `ListSessionsRequest`** — filter sessions by multiple IDs (`idAny`) or apply squad-level overrides (`squadOverrides`) when listing sessions.
- **`PersonalityControllerFindAllRequest`** — new paginated request class for the `SimulationPersonalities` list endpoint, with full sort, limit, and date-range filter support.
- **New `SortBy` enums** — `ScorecardControllerGetPaginatedRequestSortBy` and `ProviderResourceControllerGetProviderResourcesPaginatedRequestSortBy` added for their respective list endpoints.

### Added
- **`SimulationPersonalitiesClient`** — new client for managing simulation personalities, supporting list, create, get, update, and delete operations against the `eval/simulation/personality` endpoints.
- **`SimulationRunControllerFindAllRequest`** — new request type for listing simulation runs with rich filtering by status, target type, target ID, and date ranges.
- **`SimulationRunControllerFindItemsRequest`** — new request type for listing individual simulation run items, filterable by simulation ID, run ID, status, and date ranges.
- **`SimulationRunControllerGenerateSuggestionsRequest`** — new request type for triggering AI improvement suggestion generation for a simulation run.
- **New enums** `PersonalityControllerFindAllRequestSortBy` and `PersonalityControllerFindAllRequestSortOrder` for controlling sort behavior when listing personalities.

### Added
- **`SimulationRunsClient`** — new client for managing simulation runs, supporting list, create, fetch, cancel, and item-level operations against the `eval/simulation/run` endpoints.
- **`simulationRunControllerGenerateSuggestions`** — generates AI suggestions for improving an assistant or squad's system prompt, tools, and scenarios based on a specific run item.
- **`ScenarioControllerFindAllRequest`** — new request type under `SimulationScenarios` with filtering by ID, name, status, date ranges, and pagination controls.
- **New enum types** under `Vapi\SimulationRuns\Types` for filtering and sorting simulation runs and run items, including `SimulationRunControllerFindAllRequestStatus`, `SimulationRunControllerFindItemsRequestStatus`, and related sort/order enums.

### Added
- **`SimulationScenariosClient`** — new client for managing evaluation scenarios, with methods to list, create, retrieve, update, and delete scenarios via the `eval/simulation/scenario` endpoints.
- **`SimulationSuitesClient`** — new client for managing simulation suites, with methods to list, create, duplicate, retrieve, update, and delete suites via the `eval/simulation/suite` endpoints.
- **`SimulationControllerFindAllRequest`** — new request type for filtering and paginating simulations, including `standaloneOnly`, `idAny`, date-range, and sort parameters.
- **New sort enums** (`ScenarioControllerFindAllRequestSortBy`, `ScenarioControllerFindAllRequestSortOrder`, `SimulationSuiteControllerFindAllRequestSortBy`, `SimulationSuiteControllerFindAllRequestSortOrder`, `SimulationControllerFindAllRequestSortBy`, `SimulationControllerFindAllRequestSortOrder`) for controlling list ordering across all simulation resource types.

### Added
- **`SimulationsClient`** — new client for managing simulations, supporting create, read, update, delete, concurrency query, and AI-powered scenario generation via `simulationGenerateControllerGenerate`.
- **`CreateToolsRequest::code()`** — new `code` tool variant in the `CreateToolsRequest` union type, backed by `CreateCodeToolDto`.
- **`StructuredOutputControllerFindAllRequestSortBy`** — new enum and `sortBy` field on `StructuredOutputControllerFindAllRequest` to sort structured output listings by `createdAt`, `duration`, or `cost`.
- **`ListSquadsRequest::$idAny`** — new optional filter field to return only squads matching a provided list of ids.
- **`StructuredOutputControllerRunResponseOne`** and **`UpdateStructuredOutputDtoConditionsItem`** — new response and condition union types for structured output operations.

### Added
- **`KnowledgeBaseTool` variant** (`knowledgeBase` type) added to `CreateToolsResponse`, `DeleteToolsResponse`, `GetToolsResponse`, and `ListToolsResponseItem`, including `::knowledgeBase()` factory, `isKnowledgeBase()`, and `asKnowledgeBase()` methods.
- **`GhlTool` variant** (`ghl` type) added to `CreateToolsResponse`, `DeleteToolsResponse`, `GetToolsResponse`, and `ListToolsResponseItem`, including `::ghl()` factory, `isGhl()`, and `asGhl()` methods.
- **`UpdateKnowledgeBaseToolDto` variant** (`knowledgeBase` type) added to `UpdateToolsRequestBody`, including `::knowledgeBase()` factory, `isKnowledgeBase()`, and `asKnowledgeBase()` methods.
- **`UpdateCodeToolDto` variant** (`code` type) added to `UpdateToolsRequestBody`, including `::code()` factory, `isCode()`, and `asCode()` methods.

### Added
- **`TrafficAllocationsClient`** — new client for managing assistant traffic splitting (beta), supporting paginated history, create, latest-get, and find-one operations via the `traffic-allocations` endpoints.
- **`KnowledgeBaseTool` and `GhlTool` variants** on `UpdateToolsResponse` — new union members with factory methods (`knowledgeBase()`, `ghl()`), type-check helpers (`isKnowledgeBase()`, `isGhl()`), and accessor methods (`asKnowledgeBase()`, `asGhl()`).
- **New enum cases** across several types: `AnthropicBedrockCredentialRegion::EuCentral1`, `AnthropicModelModel::ClaudeSonnet5`, `AnthropicBedrockModelModel::GlobalAnthropicClaudeHaiku4520251001V10`, and `AssemblyAiTranscriberSpeechModel::Universal35Pro`/`Universal36Pro`.
- **New enums** `AssemblyAiTranscriberMode`, `AssemblyAiTranscriberLanguageCodesItem`, and `AnthropicBedrockModelFallbackModelsItem` for expanded transcriber and model configuration.
- **New optional fields** `assistantVersion` and `squadVersion` on `AssistantActivation`, and `structuredOutputBreakdown` on `AnalysisCost` for richer call and cost introspection.

### Added
- **`AssistantDraft`** — new class representing a draft fork of an assistant, exposing the full assistant configuration alongside server-resolved fields (`id`, `orgId`, `assistantId`, `baseVersion`, `createdAt`, `updatedAt`, `createdBy`).
- **`AssistantDraftConflictResponseDto`** — new class returned when a draft creation request conflicts with an existing draft, carrying `existingDraftId`, `error`, and `message` fields.
- **`AssistantDraftBackgroundSoundZero`** and **`AssistantDraftClientMessagesItem`** — new enums supporting background sound and client message configuration on `AssistantDraft`.

### Added
- **`AssistantDraftCredentialsItem`** — new discriminated union type representing a credential item on an assistant draft, supporting all 57 credential providers (e.g. `openai`, `anthropic`, `azure`, `deepgram`, `twilio`, and more).
- **Static factory methods** on `AssistantDraftCredentialsItem` (e.g. `::openai()`, `::anthropic()`, `::azure()`) for constructing typed credential instances for each provider.
- **`is*()`/`as*()`** guard and accessor method pairs on `AssistantDraftCredentialsItem` for safely narrowing and unwrapping each provider variant.
- **JSON serialization/deserialization** support on `AssistantDraftCredentialsItem` via `jsonSerialize()`, `jsonDeserialize()`, and `fromJson()`, including a graceful `_unknown` fallback for unrecognized providers.

### Added
- **`AssistantDraftModel`** — new discriminated union class representing an assistant's LLM configuration, supporting 17 providers including Anthropic, OpenAI, Google, Groq, DeepSeek, and more.
- **`AssistantDraftPaginatedResponse`** and **`AssistantDraftPaginatedMetadata`** — new types for cursor-based pagination when listing draft assistants.
- **`AssistantDraftFirstMessageMode`** — new enum controlling whether the assistant speaks first, speaks first with a model-generated message, or waits for the user.
- **`AssistantDraftServerMessagesItem`** — new enum enumerating all server-side event message types available to draft assistants.

### Added
- **`AssistantDraftTranscriber`** — new discriminated union type representing all supported transcriber providers (`assembly-ai`, `azure`, `deepgram`, `11labs`, `gladia`, `google`, `speechmatics`, `talkscriber`, `openai`, `cartesia`, `soniox`, `xai`, `vapi`, and `custom-transcriber`) for assistant draft configuration.

### Added
- **`AssistantDraftVoice`** — new union type representing all supported voice providers (azure, cartesia, deepgram, 11labs, hume, lmnt, neuphonic, openai, playht, wellsaid, rime-ai, smallest-ai, tavus, vapi, sesame, inworld, minimax, xai, microsoft, custom-voice) with typed `is*()` / `as*()` accessors.
- **`AssistantDraftVoicemailDetectionZero`** — new enum with an `Off` case for disabling voicemail detection on assistant drafts.
- **`VapiModel`** provider variant — `AssistantModel` and `AssistantOverridesModel` now support the `vapi` provider via new `vapi()`, `isVapi()`, and `asVapi()` methods.
- **`AssistantOverridesServerMessagesItem::CallArtifactUpload`** — new `call.artifact.upload` enum case for subscribing to call artifact upload server messages.

### Added
- **`XaiTranscriber` and `VapiTranscriber`** provider support added to `AssistantTranscriber` and `AssistantOverridesTranscriber`, with factory methods (`xai()`, `vapi()`), type-guards (`isXai()`, `isVapi()`), and accessors (`asXai()`, `asVapi()`).
- **`XaiVoice` and `MicrosoftVoice`** provider support added to `AssistantOverridesVoice`, with corresponding factory methods, type-guards, and accessors.
- **`AssistantVersion`** — new class representing a versioned snapshot of an assistant's configuration, including metadata such as `version`, `configHash`, `parentVersion`, and `modelDeprecations`.
- **`AssistantPinnedConflictResponseDto`** and **`AssistantPinnedConflictResponseDtoError`** — new types returned when a delete is rejected because the assistant is pinned to a version.
- **`AssistantServerMessagesItem::CallArtifactUpload`** — new `call.artifact.upload` server message event case.

### Added
- **`AssistantVersionCredentialsItem`** — new discriminated union type representing a credential attached to an assistant version, supporting all 57 credential providers (e.g., `11labs`, `anthropic`, `openai`, `twilio`, `google`, and more) with typed factory methods, `is*()` guards, and `as*()` accessors.

### Added
- **`AssistantVersionModel`** — new discriminated-union class representing the LLM model for an assistant version, supporting 17 providers (Anthropic, OpenAI, Google, Groq, DeepSeek, and more) with typed `is*()`/`as*()` accessors.
- **`AssistantVersionPaginatedMetadata`** — new response type exposing `nextCursor`, `hasNextPage`, and `limit` fields for paginated assistant version listings.
- **`AssistantVersionFirstMessageMode`** — new enum controlling who speaks first in a conversation (`AssistantSpeaksFirst`, `AssistantSpeaksFirstWithModelGeneratedMessage`, `AssistantWaitsForUser`).
- **`AssistantVersionServerMessagesItem`** — new enum enumerating all supported server-side event message types for assistant versions.

### Added
- **`AssistantVersionTranscriber`** — new discriminated union type representing all supported transcriber providers (assembly-ai, azure, custom-transcriber, deepgram, 11labs, gladia, google, speechmatics, talkscriber, openai, cartesia, soniox, xai, vapi) for assistant versions, with typed factory methods, type-guard predicates, and accessor methods for each variant.

### Added
- **`AssistantVoice`** now supports `xai` and `microsoft` voice providers via new `xai()`, `microsoft()`, `isXai()`, `asXai()`, `isMicrosoft()`, and `asMicrosoft()` methods.
- **`AssistantVersionVoice`** — new union type class representing the full set of voice provider options for assistant versions, mirroring `AssistantVoice`.
- **`AssistantVersionVoicemailDetectionZero`** — new enum with an `off` case for voicemail detection configuration on assistant versions.
- **`AudioFormat`**, **`AudioFormatFormat`**, and **`AudioFormatContainer`** — new types for specifying call audio sample rate, encoding format (`pcm_s16le`, `mulaw`), and container (`raw`).
- **New enum cases** added to `AzureCredentialRegion` and `AzureOpenAiCredentialRegion` (`Switzerlandnorth`, `Switzerlandwest`) and to `AzureOpenAiCredentialModelsItem` (GPT-5.6 Luna/Terra/Sol, `gpt-4o`, `gpt-4.1`, `gpt-5.4-mini-2026-03-17`).

### Added
- **`Board`**, **`BoardInsightItem`**, **`BoardMetricWidgetItem`**, **`BoardLayout`**, **`BoardItemPosition`**, **`BoardItemSize`**, and **`BoardPaginatedResponse`** — new types for managing and querying analytics dashboard boards with positioned widgets.
- **`BooleanComparatorScorecardMetricCondition`** — new type (with supporting enums) for defining boolean-valued scorecard metric conditions with point scoring.
- **`BackgroundSoundUrlValidationResult`** and **`BackgroundSoundUrlValidationResultReason`** — new types for reporting whether a background-sound URL serves a valid live audio file and why validation may have failed.
- **`CallArtifactUploadItemType`** enum and new **`CallEndedReason`** cases — covers xAI voice/transcriber failures, Microsoft voice failures, Cartesia transcriber failures, call-forwarding no-answer, SIP outbound errors, squad/version validation errors, and more.
- **`BotMessage::$assistantName`** and **`BotMessage::$assistantId`** — new optional fields that identify the specific sub-agent that produced each message in multi-agent (squad/handoff) calls.

### Added
- **`CallTransport`** — new union type representing the transport layer of a call, supporting `vapi.websocket`, `vonage`, `twilio`, `vapi.sip`, `telnyx`, and `daily` providers with typed accessors.
- **Campaign management types** — `CampaignSummary`, `CampaignContact`, `CampaignContactWithOutcome`, `CampaignCallMetrics`, `CampaignContactCounters`, `CampaignPredialPlan`, and matching paginated response and enum types for full campaign lifecycle tracking.
- **`CampaignStatus::Cancelled` and `CampaignStatus::Archived`** — two new status values on the `CampaignStatus` enum.
- **`CartesiaVoiceModel::Sonic35` / `Sonic3520260504`** and **`CartesiaTranscriberModel::Ink2`** — new Cartesia model enum cases for the latest Sonic 3.5 voice and Ink-2 transcription models.
- **`CartesiaCredential::$apiUrl`** — new optional field to point the Cartesia integration at an on-premises instance instead of the default `api.cartesia.ai`.

## 2.0.0 - 2026-06-24
### Breaking Changes
* **`CartesiaExperimentalControlsSpeedZero`** has been renamed to `CartesiaSpeedControlZero`. Update any references to this enum in your code to use the new name.
* **`FallbackAzureVoiceVoiceIdZero`** has been renamed to `FallbackAzureVoiceIdZero`. Update any references to this enum in your code to use the new name.

## 1.1.0 - 2026-04-22
### Added
* **`Call::$subscriptionLimits`** — new optional `SubscriptionLimits` field on `Call` that exposes the organization's concurrency and subscription limits at the time of the call.

## 1.0.1 - 2026-04-10
* style: use string interpolation in JsonException messages
* Replace string concatenation with double-quoted string interpolation
* in error messages thrown by JsonDecoder, JsonDeserializer, and
* JsonSerializer. The resulting messages are identical at runtime.
* Key changes:
* Replace `"..." . $json` with `"...$json"` in JsonDecoder error messages
* Replace `"..." . $type` with `"...$type"` in JsonDeserializer error message
* Replace `"..." . $unionType` with `"...$unionType"` in JsonSerializer error message
* 🌿 Generated with Fern

## 1.0.0 - 2026-04-07
* Several public classes have been removed in this release. The following types no longer exist and must be migrated:
* `UpdateAssistantDtoVoicemailDetection` and `AssistantOverridesVoicemailDetection` — removed voicemail detection union type classes; consult the updated API types for replacements.
* `CallControllerFindAllPaginatedRequest` and `CallControllerFindAllPaginatedRequestSortOrder` — removed call-listing request class and sort-order enum; update call-listing code to use the new request type.
* `SessionsListRequest` — removed session-listing request class; update session-listing code to use the new request type.
* `RetryMiddleware` — removed internal retry middleware class; avoid direct references to this class.
* Several public types have been removed in this release:
* **`AssistantVoicemailDetection`**, **`CreateAssistantDtoVoicemailDetection`**, **`CreateWorkflowDtoVoicemailDetection`**, and **`UpdateWorkflowDtoVoicemailDetection`** have been deleted. Replace usages with the consolidated shared voicemail detection plan types (`GoogleVoicemailDetectionPlan`, `OpenAiVoicemailDetectionPlan`, `TwilioVoicemailDetectionPlan`, or `VapiVoicemailDetectionPlan`) directly.
* **`UpdateSupabaseCredentialDto`** has been removed. Update any code that instantiated or type-hinted this class.
* The **`speakerLabel`** property has been removed from `BotMessage`. Remove any access to `$botMessage->speakerLabel` in consuming code.
* The `WorkflowVoicemailDetection` and `WorkflowUserEditableVoicemailDetection` classes have been removed. Additionally, `AssistantsListRequest` has been renamed to `ListAssistantsRequest` — update any references accordingly. Several `AssistantsClient` methods (`list`, `create`, `get`, `delete`, `update`) and `AnalyticsClient::get()` now return nullable types (`?Assistant`, `?array`, etc.) instead of non-nullable types; callers should add null checks where needed.
* **Breaking changes in this release:**
* `CallsListRequest` has been renamed to `ListCallsRequest`. Update all usages accordingly.
* The `callControllerFindAllPaginated()` method has been removed from `CallsClient`. Use `list()` instead.
* Return types for `CallsClient` methods (`list`, `create`, `get`, `delete`, `update`) and all `CampaignsClient` methods are now nullable (e.g. `?Call` instead of `Call`). Callers must handle `null` responses.
* The `voicemailDetection` field on `UpdateAssistantDto` now accepts a union of provider-specific plan objects (`GoogleVoicemailDetectionPlan`, `OpenAiVoicemailDetectionPlan`, `TwilioVoicemailDetectionPlan`, `VapiVoicemailDetectionPlan`) instead of `UpdateAssistantDtoVoicemailDetection`.
**New features:**
* `SessionCreatedHook` is now supported in the `hooks` array on `UpdateAssistantDto`.
* `monitorPlan` now supports attaching monitors via `monitorPlan.monitorIds`.
* The SDK now supports squad-based campaigns via a new `squadId` field on `CreateCampaignDto` and `UpdateCampaignDto`, and introduces `dialPlan` (a list of `DialPlanEntry` objects) as an alternative to `phoneNumberId` for routing calls to different customer sets per phone number. The `ChatsListRequest` class has been renamed to `ListChatsRequest` and gains new filter fields (`id`, `assistantIdAny`, `previousChatId`) while removing `workflowId`. Methods on `ChatsClient` (`list`, `get`, `delete`, `create`, `createResponse`) now return nullable types to handle empty API responses. The underlying HTTP client has been migrated from Guzzle to PSR-18-compatible interfaces, enabling use of any PSR-18 HTTP client implementation.
* All `EvalClient` and `FilesClient` methods now return nullable types (e.g., `?Eval_`, `?File`, `?EvalPaginatedResponse`) to gracefully handle empty API responses instead of throwing a deserialization error. DateTime filter parameters are now correctly serialized before being sent as query parameters. The HTTP client dependency has been updated to use the PSR-18 standard interface, improving compatibility with non-Guzzle HTTP client implementations.
* Several `PhoneNumbers` public classes have been renamed for consistency. The old names (`PhoneNumbersListRequest`, `PhoneNumbersListResponseItem`, `PhoneNumbersCreateRequest`, `PhoneNumbersCreateResponse`, `PhoneNumbersGetResponse`, `PhoneNumbersDeleteResponse`, `PhoneNumbersUpdateRequest`, `PhoneNumbersUpdateResponse`) must be replaced with their new equivalents (e.g., `ListPhoneNumbersRequest`, `CreatePhoneNumbersRequest`, `GetPhoneNumbersResponse`, `DeletePhoneNumbersResponse`, `UpdatePhoneNumbersRequest`, `UpdatePhoneNumbersResponse`). All `PhoneNumbersClient` methods (`list`, `create`, `get`, `delete`, `update`, `phoneNumberControllerFindAllPaginated`) now return nullable types — callers must handle `null` when the response body is empty.
* Several public classes have been renamed in this release. `PhoneNumbersUpdateRequest` is now `UpdatePhoneNumbersRequestBody`, `PhoneNumbersDeleteResponse` is now `UpdatePhoneNumbersResponse`, `SessionsListRequest` is now `ListSessionsRequest`, and `SquadsListRequest` is now `ListSquadsRequest`. All `ProviderResourcesClient` and `SessionsClient` methods (`list`, `create`, `get`, `delete`, `update`) now return nullable types — callers must add null checks to handle empty responses. The `ListSessionsRequest` object also gains new optional filter fields: `id`, `assistantIdAny`, `numberE164CheckEnabled`, `extension`, `assistantOverrides`, `number`, `sipUri`, `email`, `externalId`, `customerNumberAny`, `phoneNumberId`, and `phoneNumberIdAny`.
* Several breaking changes have been introduced in this release:
* The `list`, `create`, `get`, `delete`, and `update` methods on `SquadsClient`, and all equivalent methods on `StructuredOutputsClient`, now return nullable types (e.g. `?Squad`, `?StructuredOutput`). Callers that previously assumed a non-null return value must now add null checks.
* `ToolsListRequest` has been renamed to `ListToolsRequest`, and `SquadsListRequest` has been renamed to `ListSquadsRequest`. Update any instantiation or type hints accordingly.
* The HTTP client dependency has been migrated from `GuzzleHttp\ClientInterface` to `Psr\Http\Client\ClientInterface`; any custom client injection must now implement PSR-18.
* New capabilities in this release include a `structuredOutputControllerRun()` method on `StructuredOutputsClient` for on-demand structured output execution, new optional `type`, `regex`, and `compliancePlan` fields on `UpdateStructuredOutputDto`, and Anthropic Bedrock model support (`anthropic-bedrock`) in `UpdateStructuredOutputDtoModel`.
* Several Tools API types have been renamed to follow a consistent convention: `ToolsCreateRequest` → `CreateToolsRequest`, `ToolsListRequest` → `ListToolsRequest`, `ToolsGetResponse` → `GetToolsResponse`, `ToolsDeleteResponse` → `DeleteToolsResponse`, `ToolsUpdateRequest` → `UpdateToolsRequest`, and `ToolsUpdateResponse` → `UpdateToolsResponse`. All `ToolsClient` methods (`list`, `create`, `get`, `delete`, `update`) now return nullable types. Two new tool variants — `sipRequest` and `voicemail` — are now supported in `CreateToolsRequest`.
* The `ToolsCreateResponse` class has been renamed to `CreateToolsResponse`. Callers must update any references to `ToolsCreateResponse` to use `CreateToolsResponse` instead. Additionally, the tools create response union now supports three new tool variants: `CodeTool`, `SipRequestTool`, and `VoicemailTool`, accessible via the new `code()`, `sipRequest()`, and `voicemail()` factory methods and their corresponding `isCode()`/`asCode()`, `isSipRequest()`/`asSipRequest()`, and `isVoicemail()`/`asVoicemail()` accessors.
* The `ToolsDeleteResponse` class has been renamed to `DeleteToolsResponse` in the `Vapi\Tools\Types` namespace. Consumers must update all references to use the new class name. Additionally, the response union type now supports three new tool variants: `CodeTool`, `SipRequestTool`, and `VoicemailTool`, each with corresponding factory methods and type-check helpers.
* The `ToolsUpdateResponse` class has been renamed to `GetToolsResponse`. Consumers referencing `ToolsUpdateResponse` by name must update their code to use `GetToolsResponse` instead. Three new tool variants — `CodeTool`, `SipRequestTool`, and `VoicemailTool` — are now supported in the `GetToolsResponse` union type, with corresponding factory methods (`code()`, `sipRequest()`, `voicemail()`) and type-check/cast helpers.
* The `ToolsListResponseItem` class has been renamed to `ListToolsResponseItem`, and `ToolsUpdateRequest` has been renamed to `UpdateToolsRequestBody`. Consumers must update any references to these class names. Both union types now also support three new tool variants: `code`, `sipRequest`, and `voicemail`, with corresponding factory methods and type-safe accessors.
* The `ToolsGetResponse` class has been renamed to `UpdateToolsResponse`. Update any references to `ToolsGetResponse` in your code to use `UpdateToolsResponse` instead. The `voicemailDetection` property on `Assistant` and `AssistantOverrides` now accepts a richer union type (`GoogleVoicemailDetectionPlan`, `OpenAiVoicemailDetectionPlan`, `TwilioVoicemailDetectionPlan`, `VapiVoicemailDetectionPlan`, or a string) instead of the previous single-type values. New tool types (`CodeTool`, `SipRequestTool`, `VoicemailTool`) are now supported in the tools union, `SessionCreatedHook` is available in hooks arrays, and `AssemblyAiTranscriber` gains optional `vadAssistedEndpointingEnabled` and `speechModel` fields.
* The SDK introduces several new capabilities:
* **Campaigns** now support a `squadId` field and a `dialPlan` (list of dial entries with per-number customer sets); `phoneNumberId` and `customers` are now optional to accommodate the new dial plan flow.
* **Client messages** gain two new types: `ClientMessageAssistantStarted` and `ClientMessageAssistantSpeech`. `ClientMessageModelOutput` and `ClientMessageUserInterrupted` now include an optional `turnId` for correlating LLM response tokens and interruptions.
* **`CreateAssistantDto`** voicemail detection has been expanded to support multiple providers (Google, OpenAI, Twilio, Vapi) and the hooks array now accepts `SessionCreatedHook`.
* **`CreateWebChatDto`** now accepts either an `assistantId` or an inline transient `assistant` object, and supports a new `sessionExpirationSeconds` field.
* **`CreateStructuredOutputDto`** gains `type` (ai/regex), `regex`, and `compliancePlan` fields; `CreateStructuredOutputDtoModel` now supports the `anthropic-bedrock` provider.
* A new `CreateSonioxCredentialDto` class is available for Soniox credential management.
* Several breaking changes have been introduced in this release:
* The `Eval` class has been renamed to `Eval_` (file renamed from `Eval.php` to `Eval_.php`). Update any references to use the new class name.
* The `FallbackSpeechmaticsTranscriber` class has removed the `maxSpeakers`, `enablePartials`, `enableEntities`, `enablePunctuation`, and `enableCapitalization` fields. Remove any usage of these fields from your code.
* The `EvalAnthropicModel` and `EvalGroqModel` classes now require a `messages` field, and `EvalRun` now requires `cost` and `costs` fields — existing construction of these objects without these fields will fail.
* New optional fields have also been added across multiple types: `profanityFilter` on `DeepgramTranscriber`, VAD configuration fields on `ElevenLabsTranscriber` and `FallbackElevenLabsTranscriber`, `encryptionPlan` on `CustomCredential`, `vadAssistedEndpointingEnabled` and `speechModel` on `FallbackAssemblyAiTranscriber`, `temperature` and `speakingRate` on `FallbackInworldVoice`, and `subtitleType` on `FallbackMinimaxVoice`.
* Several breaking changes and new features are included in this release.
**Breaking changes:**
* `StructuredOutputsFilterValue` has been renamed to `StructuredOutputFilterDto`. Update all references accordingly.
* `UpdateTavusCredentialDto` has been renamed to `UpdateSonioxCredentialDto`; `UpdateSmallestAiCredentialDto` has been renamed to `UpdateWellSaidCredentialDto`.
* `TwilioVoicemailDetectionPlan` and `VapiVoicemailDetectionPlan` constructors now require a `provider` field; callers using `array $values = []` must pass `provider`.
* `ToolCallHookAction` constructor now requires a `type` field.
* Five fields (`maxSpeakers`, `enablePartials`, `enableEntities`, `enablePunctuation`, `enableCapitalization`) have been removed from `SpeechmaticsTranscriber`.
* The `voicemailDetection` property on `Workflow`, `WorkflowUserEditable`, and `UpdateWorkflowDto` is now a discriminated union of concrete plan types instead of a single wrapper type.
**New features:**
* Two new sub-clients, `InsightClient` and `ObservabilityScorecardClient`, are now available as `$client->insight` and `$client->observabilityScorecard`.
* `StructuredOutput` now supports a `type` field (`'ai'` or `'regex'`) and a `regex` field for pattern-based extraction, as well as a `compliancePlan` field.
* `StructuredOutputModel` now supports the `anthropic-bedrock` provider via `StructuredOutputModel::anthropicBedrock()`.
* Workflow hooks arrays now accept `CallHookModelResponseTimeout` entries.
* The SDK's HTTP layer has been migrated from a hard dependency on `guzzlehttp/guzzle` to PSR-18/PSR-17 interfaces resolved at runtime via `php-http/discovery`. Any PSR-18-compatible client (Guzzle, Symfony HTTP Client, etc.) can now be used. The `ChatsListRequestSortOrder` enum has been renamed to `ListChatsRequestSortOrder`; update any references accordingly. Multipart form-data uploads are now supported via the new `MultipartApiRequest`, `MultipartFormData`, and `MultipartFormDataPart` classes, and the retry logic now honours `Retry-After` and `X-RateLimit-Reset` response headers.
* The `SessionsListRequestSortOrder` enum has been renamed to `ListSessionsRequestSortOrder`. Update any references to this enum in your code to use the new name.
* The `AzureCredentialRegion` and `AzureOpenAiCredentialRegion` enums have had the `Australia` case renamed to `Australiaeast`; update any references accordingly. Several new region cases have been added (`Centralus`, `Germanywestcentral`, `Polandcentral`, `Spaincentral`, `Westeurope`).
* Additional improvements include new `AssistantStarted` and `AssistantSpeechStarted` server message enum cases, correct UTC datetime serialization using `Z` suffix, accurate bool serialization/deserialization, and support for serializing explicitly-set null properties via a new `_setField()` helper on model classes.
* The `CartesiaExperimentalControlsSpeed` enum has been renamed to `CartesiaExperimentalControlsSpeedZero`. Update any references to this enum in your code. Additionally, the `do` property of `CallHookCallEnding` now uses `CallHookCallEndingDoItem` instead of `ToolCallHookAction`. The SDK also expands `CallEndedReason` with ~60 new error/status cases (Vapi/WellSaid voice failures, Baseten/Minimax LLM errors, Soniox transcriber errors, and new SIP call failure codes), and `CartesiaVoiceLanguage` with 27 new language codes.
* The SDK now supports additional Azure regions (`australiaeast`, `centralus`, `germanywestcentral`, `polandcentral`, `spaincentral`, `westeurope`) in `CreateAzureCredentialDtoRegion` and `CreateAzureOpenAiCredentialDtoRegion`. Two new server message types (`assistant.started`, `assistant.speechStarted`) are available in `CreateAssistantDtoServerMessagesItem`, and `ChatEvalToolResponseMessageEvaluation` is now a valid message type in `CreateEvalDto`.
* The SDK now includes expanded OpenAI GPT-5.x model enum cases (`gpt-5.4`, `gpt-5.4-mini`, `gpt-5.4-nano`, `gpt-5.2`, `gpt-5.1`, and more) in `EvalOpenAiModelModel`, along with new regional deployment cases for GPT-4.1, GPT-4.1-mini, and GPT-4o (westeurope, germanywestcentral, polandcentral, spaincentral). `FallbackCartesiaVoiceLanguage` now supports 25+ additional languages (Arabic, Bulgarian, Bengali, Czech, Danish, etc.). The `FallbackAzureVoiceVoiceId` enum has been renamed to `FallbackAzureVoiceVoiceIdZero` — update any direct references to this enum in your code. Several RimeAI voice IDs have been removed and replaced with new ones; review usages of `FallbackRimeAiVoiceIdEnum` and update to the new available cases.
* The `RimeAiVoiceIdEnum` enum has been updated with a new set of voice IDs that reflect the current Rime AI voice catalogue. Many previously available cases (e.g. `Abbie`, `Allison`, `Ally`, `Bayou`, `Brook`, etc.) have been removed and replaced with new ones. Update any code that references removed voice ID cases to use the new equivalents.
* Additionally, the `Gpt41106PreviewAustralia` case in `OpenAiModelModel` and `OpenAiModelFallbackModelsItem` has been renamed to `Gpt41106PreviewAustraliaeast` (value changed from `"gpt-4-1106-preview:australia"` to `"gpt-4-1106-preview:australiaeast"`). New GPT-5.x model variants and additional European regional deployment options have also been added to both enums.
* The `ServerMessageEndOfCallReportEndedReason` enum has been expanded with over 40 new cases covering additional voice providers (Vapi, WellSaid), transcribers (ElevenLabs, Google, OpenAI, Soniox), LLM providers (Baseten, Minimax), SIP connection error scenarios, and new call-state transitions such as `CustomerEndedCallDuringTransfer`. Several previously available enum cases (`CallInProgressErrorWarmTransferHangTimeout`, `CallInProgressErrorWarmTransferIdleTimeout`, `CallRingingErrorSipInboundCallFailedToConnect`) have been removed or repositioned — consumers matching against these specific values should update their code accordingly.
* The `ServerMessageStatusUpdateEndedReason` enum has been expanded with new cases covering additional voice providers (Vapi, WellSaid), transcriber failures (ElevenLabs, Google, OpenAI, Soniox), LLM provider errors (Baseten, Minimax), SIP call connection errors, and new call lifecycle events such as `CustomerEndedCallDuringTransfer`. PHPDoc type annotations across numerous request/response types have been updated to reference typed enum constants instead of hardcoded string literals.
* The `Australia` enum case in `UpdateAzureCredentialDtoRegion` and `UpdateAzureOpenAiCredentialDtoRegion` has been renamed to `Australiaeast` (value changed from `"australia"` to `"australiaeast"`). Similarly, the `Gpt41106PreviewAustralia` case in `WorkflowOpenAiModelModel` has been renamed to `Gpt41106PreviewAustraliaeast`. Any code referencing these enum cases by name must be updated.
* The SDK also adds several new GPT-5 model variants (`gpt-5.4`, `gpt-5.4-mini`, `gpt-5.4-nano`, `gpt-5.2`, `gpt-5.1`, and their chat-latest aliases) and new Azure-hosted regional endpoints for GPT-4 models (westeurope, germanywestcentral, polandcentral, spaincentral), along with new Azure credential regions (centralus, germanywestcentral, polandcentral, spaincentral, westeurope).
* The SDK now supports additional credential providers (`anthropic-bedrock`, `soniox`, `wellsaid`, `email`, `slack-webhook`), LLM models (`AnthropicBedrockModel`, `MinimaxLlmModel`), voice provider (`WellSaidVoice`), and transcriber (`SonioxTranscriber`) on the assistant update DTOs. Two new client message enum cases (`AssistantSpeechStarted`, `AssistantStarted`) and a new `UpdateAssistantDtoVoicemailDetectionZero` enum have also been added.
* The SDK now includes a new `InsightClient` for managing and running reporting insights via the `reporting/insight` API endpoints (list, create, find, update, delete, run, and preview). HTTP requests now benefit from automatic retry logic with exponential backoff, jitter, and support for `Retry-After` and `X-RateLimit-Reset` response headers. A new optional `squadOverrides` field has been added to `CreateCallDto` to allow overriding settings for all members of a squad.
* The SDK now includes types for the Insight API, enabling creation, preview, and retrieval of bar, pie, line, and text insights. New classes include `InsightControllerCreateRequest`, `InsightControllerCreateResponse`, `InsightControllerFindOneResponse`, `InsightControllerPreviewRequest`, and the `InsightControllerFindAllRequestSortOrder` enum.
* New `ObservabilityScorecardClient` is now available, providing methods to create, retrieve, update, delete, and paginate scorecards (`scorecardControllerCreate`, `scorecardControllerGet`, `scorecardControllerRemove`, `scorecardControllerUpdate`, `scorecardControllerGetPaginated`). Three new Insight union-type classes have also been added: `InsightControllerRemoveResponse`, `InsightControllerUpdateRequestBody`, and `InsightControllerUpdateResponse`, each supporting bar, pie, line, and text insight variants.
* The SDK now includes new request classes for paginating and updating scorecards (`ScorecardControllerGetPaginatedRequest`, `UpdateScorecardDto`), listing sessions with rich filtering (`ListSessionsRequest`), running structured outputs (`StructuredOutputRunDto`), and updating phone numbers and tools (`UpdatePhoneNumbersRequest`, `UpdateToolsRequest`). `CreateSessionDto` gains two new optional fields: `assistantOverrides` and `customerId`. Cost tracking types (`AnalysisCost`, `AnalysisCostBreakdown`) now expose optional `cachedPromptTokens` fields, and `AnalyticsOperationColumn` includes a new `CostBreakdownLlmCachedPromptTokens` case for analytics queries.
* The SDK now supports Anthropic Claude models via AWS Bedrock. New `AnthropicBedrockCredential` and `AnthropicBedrockModel` types are available, enabling configuration of Claude 3, 3.5, 3.7, and 4 model variants through the AWS Bedrock service with IAM or STS-based authentication.
* The SDK now includes a new `AnthropicBedrockModelToolsItem` union type that supports all 23 tool variants (including GoHighLevel, Google Calendar/Sheets, MCP, Slack, SIP, and voicemail tools) for use with Anthropic Bedrock models. Three additional Claude model enum cases have been added to `AnthropicModelModel`: `ClaudeOpus4520251101`, `ClaudeOpus46`, and `ClaudeSonnet46`. A new `AnthropicCredentialProvider` enum is also now available.
* The SDK now supports three new tool types — `code`, `sipRequest`, and `voicemail` — across all model tool union types, with full factory and accessor methods. `ArtifactPlan` accepts inline `structuredOutputs`, `scorecardIds`, and `scorecards` for in-call scorecard evaluation. The `Artifact` type now exposes `assistantActivations`, `scorecards`, and `structuredOutputsLastUpdatedAt` fields, and a new `AssistantActivation` class tracks which assistants were active during a call.
* The SDK now supports additional credential providers: Anthropic Bedrock, Soniox, WellSaid, Email, and Slack Webhook — available via new factory and accessor methods on `AssistantCredentialsItem` and `AssistantOverridesCredentialsItem`. New AI model variants `anthropic-bedrock` and `minimax` are also supported on `AssistantModel`. Additionally, `AssistantMessageJudgePlanAi` gains a new required `type` field and an optional `autoIncludeMessageHistory` field, and new enum cases `AssistantSpeechStarted` and `AssistantStarted` have been added to `AssistantOverridesClientMessagesItem`.
* The SDK now supports additional LLM providers (`anthropic-bedrock` and `minimax`) in assistant model configuration, a new `soniox` transcription provider, and a `wellsaid` voice provider. New tool types (`code`, `sipRequest`, `voicemail`) are available in assistant tool override configurations. New types for speech word timing (`AssistantSpeechWordAlignmentTiming`, `AssistantSpeechWordProgressTiming`, `AssistantSpeechWordTimestamp`) and AWS STS authentication (`AwsStsAssumeRoleUser`, `AwsStsAuthenticationArtifact`, `AwsStsAuthenticationPlan`) have also been added.
* The SDK now includes new AWS STS authentication types (`AwsStsAuthenticationSession`, `AwsStsCredentials`, `AwsiamCredentialsAuthenticationPlan`) and provider enums (`AzureCredentialProvider`, `AzureOpenAiCredentialProvider`, `ByoSipTrunkCredentialProvider`). New `BarInsight` and related analytics types are available for creating bar chart insights. Call hook actions now support a `message.add` variant via `MessageAddHookAction`, and a new `CallHookCallEndingDoItem` type enables actions on call-ending hooks. The `Call` type gains optional `endedMessage` and `squadOverrides` fields, and `CallBatchResponse` gains an optional `subscriptionLimits` field.
* The SDK now supports new call hook types including `CallHookModelResponseTimeout` and `CallHookTranscriberEndpointedSpeechLowConfidence`, as well as a `message.add` action variant on existing hook do-item types. Cartesia voice configuration gains optional `generationConfig` and `pronunciationDictId` fields, plus new sonic-3 model variants. `CerebrasModelToolsItem` now supports `code`, `sipRequest`, and `voicemail` tool types.

