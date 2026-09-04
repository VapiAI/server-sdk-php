# Reference
## Assistants
<details><summary><code>$client-&gt;assistants-&gt;list($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns assistants for the authenticated organization. Filter results by creation or update timestamps and limit the number returned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->assistants->list(
    new ListAssistantsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;assistants-&gt;create($request) -> ?Assistant</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a reusable assistant configuration containing the model, voice, transcriber, tools, prompts, and call behavior.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->assistants->create(
    new CreateAssistantDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateAssistantDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;assistants-&gt;assistantControllerValidateBackgroundSoundUrl($request) -> ?BackgroundSoundUrlValidationResult</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->assistants->assistantControllerValidateBackgroundSoundUrl(
    new ValidateBackgroundSoundUrlDto([
        'url' => 'https://example.com/my-sound.mp3',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$url:** `string` — This is the background sound URL to validate. The server performs a ranged request and checks that the URL serves a live media file.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;assistants-&gt;get($id) -> ?Assistant</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the assistant identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->assistants->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the assistant.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;assistants-&gt;delete($id) -> ?Assistant</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the assistant identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->assistants->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the assistant.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;assistants-&gt;update($id, $request) -> ?Assistant</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the specified fields of the assistant identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->assistants->update(
    'id',
    new UpdateAssistantDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the assistant.
    
</dd>
</dl>

<dl>
<dd>

**$transcriber:** `?UpdateAssistantDtoTranscriber` — These are the options for the assistant's transcriber.
    
</dd>
</dl>

<dl>
<dd>

**$model:** `?UpdateAssistantDtoModel` — These are the options for the assistant's LLM.
    
</dd>
</dl>

<dl>
<dd>

**$voice:** `?UpdateAssistantDtoVoice` — These are the options for the assistant's voice.
    
</dd>
</dl>

<dl>
<dd>

**$firstMessage:** `?string` 

This is the first message that the assistant will say. This can also be a URL to a containerized audio file (mp3, wav, etc.).

If unspecified, assistant will wait for user to speak and use the model to respond once they speak.
    
</dd>
</dl>

<dl>
<dd>

**$firstMessageInterruptionsEnabled:** `?bool` — Set to `true` to allow the user to interrupt the assistant while it speaks the first message. Default is `false`.
    
</dd>
</dl>

<dl>
<dd>

**$firstMessageMode:** `?string` 

This is the mode for the first message. Default is 'assistant-speaks-first'.

Use:
- 'assistant-speaks-first' to have the assistant speak first.
- 'assistant-waits-for-user' to have the assistant wait for the user to speak first.
- 'assistant-speaks-first-with-model-generated-message' to have the assistant speak first with a message generated by the model based on the conversation state. (`assistant.model.messages` at call start, `call.messages` at squad transfer points).

@default 'assistant-speaks-first'
    
</dd>
</dl>

<dl>
<dd>

**$voicemailDetection:** `string|GoogleVoicemailDetectionPlan|OpenAiVoicemailDetectionPlan|TwilioVoicemailDetectionPlan|VapiVoicemailDetectionPlan|null` 

These are the settings to configure or disable voicemail detection. Alternatively, voicemail detection can be configured using the model.tools=[VoicemailTool].
By default, voicemail detection is disabled.
    
</dd>
</dl>

<dl>
<dd>

**$clientMessages:** `?array` — These are the messages that will be sent to your Client SDKs. Default is conversation-update,function-call,hang,model-output,speech-update,status-update,transfer-update,transcript,tool-calls,user-interrupted,voice-input,workflow.node.started,assistant.started. You can check the shape of the messages in ClientMessage schema.
    
</dd>
</dl>

<dl>
<dd>

**$serverMessages:** `?array` — These are the messages that will be sent to your Server URL. Default is conversation-update,end-of-call-report,function-call,hang,speech-update,status-update,tool-calls,transfer-destination-request,handoff-destination-request,user-interrupted,assistant.started. You can check the shape of the messages in ServerMessage schema.
    
</dd>
</dl>

<dl>
<dd>

**$maxDurationSeconds:** `?float` 

This is the maximum number of seconds that the call will last. When the call reaches this duration, it will be ended.

@default 600 (10 minutes)
    
</dd>
</dl>

<dl>
<dd>

**$backgroundSound:** `string|null` 

This is the background sound in the call. Default for phone calls is 'office' and default for web calls is 'off'.
You can also provide a custom sound by providing a URL to an audio file.
    
</dd>
</dl>

<dl>
<dd>

**$modelOutputInMessagesEnabled:** `?bool` 

This determines whether the model's output is used in conversation history rather than the transcription of assistant's speech.

@default false
    
</dd>
</dl>

<dl>
<dd>

**$transportConfigurations:** `?array` — These are the configurations to be passed to the transport providers of assistant's calls, like Twilio. You can store multiple configurations for different transport providers. For a call, only the configuration matching the call transport provider is used.
    
</dd>
</dl>

<dl>
<dd>

**$observabilityPlan:** `?LangfuseObservabilityPlan` 

This is the plan for observability of assistant's calls.

Currently, only Langfuse is supported.
    
</dd>
</dl>

<dl>
<dd>

**$credentials:** `?array` — These are dynamic credentials that will be used for the assistant calls. By default, all the credentials are available for use in the call but you can supplement an additional credentials using this. Dynamic credentials override existing credentials.
    
</dd>
</dl>

<dl>
<dd>

**$hooks:** `?array` — This is a set of actions that will be performed on certain events.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 

This is the name of the assistant.

This is required when you want to transfer between assistants in a call.
    
</dd>
</dl>

<dl>
<dd>

**$voicemailMessage:** `?string` 

This is the message that the assistant will say if the call is forwarded to voicemail.

If unspecified, it will hang up.
    
</dd>
</dl>

<dl>
<dd>

**$endCallMessage:** `?string` 

This is the message that the assistant will say if it ends the call.

If unspecified, it will hang up without saying anything.
    
</dd>
</dl>

<dl>
<dd>

**$endCallPhrases:** `?array` — This list contains phrases that, if spoken by the assistant, will trigger the call to be hung up. Case insensitive.
    
</dd>
</dl>

<dl>
<dd>

**$compliancePlan:** `?CompliancePlan` — Compliance settings for the assistant, including HIPAA and PCI behavior, security filtering, and recording consent.
    
</dd>
</dl>

<dl>
<dd>

**$metadata:** `?array` — This is for metadata you want to store on the assistant.
    
</dd>
</dl>

<dl>
<dd>

**$backgroundSpeechDenoisingPlan:** `?BackgroundSpeechDenoisingPlan` 

This enables filtering of noise and background speech while the user is talking.

Features:
- Smart denoising using Krisp
- Fourier denoising

Smart denoising can be combined with or used independently of Fourier denoising.

Order of precedence:
- Smart denoising
- Fourier denoising
    
</dd>
</dl>

<dl>
<dd>

**$analysisPlan:** `?AnalysisPlan` — This is the plan for analysis of assistant's calls. Stored in `call.analysis`.
    
</dd>
</dl>

<dl>
<dd>

**$artifactPlan:** `?ArtifactPlan` — This is the plan for artifacts generated during assistant's calls. Stored in `call.artifact`.
    
</dd>
</dl>

<dl>
<dd>

**$startSpeakingPlan:** `?StartSpeakingPlan` 

This is the plan for when the assistant should start talking.

You should configure this if you're running into these issues:
- The assistant is too slow to start talking after the customer is done speaking.
- The assistant is too fast to start talking after the customer is done speaking.
- The assistant is so fast that it's actually interrupting the customer.
    
</dd>
</dl>

<dl>
<dd>

**$stopSpeakingPlan:** `?StopSpeakingPlan` 

This is the plan for when assistant should stop talking on customer interruption.

You should configure this if you're running into these issues:
- The assistant is too slow to recognize customer's interruption.
- The assistant is too fast to recognize customer's interruption.
- The assistant is getting interrupted by phrases that are just acknowledgments.
- The assistant is getting interrupted by background noises.
- The assistant is not properly stopping -- it starts talking right after getting interrupted.
    
</dd>
</dl>

<dl>
<dd>

**$monitorPlan:** `?MonitorPlan` 

This is the plan for real-time monitoring of the assistant's calls.

Usage:
- To enable live listening of the assistant's calls, set `monitorPlan.listenEnabled` to `true`.
- To enable live control of the assistant's calls, set `monitorPlan.controlEnabled` to `true`.
- To attach monitors to the assistant, set `monitorPlan.monitorIds` to the set of monitor ids.
    
</dd>
</dl>

<dl>
<dd>

**$credentialIds:** `?array` — These are the credentials that will be used for the assistant calls. By default, all the credentials are available for use in the call but you can provide a subset using this.
    
</dd>
</dl>

<dl>
<dd>

**$server:** `?Server` 

This is where Vapi will send webhooks. You can find all webhooks available along with their shape in ServerMessage schema.

The order of precedence is:

1. assistant.server.url
2. phoneNumber.serverUrl
3. org.serverUrl
    
</dd>
</dl>

<dl>
<dd>

**$keypadInputPlan:** `?KeypadInputPlan` — Configuration for collecting and processing DTMF keypad input during calls.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Squads
<details><summary><code>$client-&gt;squads-&gt;list($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns squads for the authenticated organization. Filter results by creation or update timestamps and limit the number returned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->squads->list(
    new ListSquadsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$idAny:** `?string` — Return only squads matching the provided ids
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;squads-&gt;create($request) -> ?Squad</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a squad that coordinates multiple assistants and their handoffs during a conversation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->squads->create(
    new CreateSquadDto([
        'members' => [
            new SquadMemberDto([]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateSquadDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;squads-&gt;get($id) -> ?Squad</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the squad identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->squads->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the squad.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;squads-&gt;delete($id) -> ?Squad</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the squad identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->squads->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the squad.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;squads-&gt;update($id, $request) -> ?Squad</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the specified fields of the squad identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->squads->update(
    'id',
    new UpdateSquadDto([
        'members' => [
            new SquadMemberDto([]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the squad.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the squad.
    
</dd>
</dl>

<dl>
<dd>

**$members:** `array` 

This is the list of assistants that make up the squad.

The call will start with the first assistant in the list.
    
</dd>
</dl>

<dl>
<dd>

**$membersOverrides:** `?AssistantOverrides` 

This can be used to override all the assistants' settings and provide values for their template variables.

Both `membersOverrides` and `members[n].assistantOverrides` can be used together. First, `members[n].assistantOverrides` is applied. Then, `membersOverrides` is applied as a global override.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Calls
<details><summary><code>$client-&gt;calls-&gt;list($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns calls for the authenticated organization. Filter results by call ID, assistant ID, phone number ID, or creation and update timestamps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->list(
    new ListCallsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `?string` — This is the unique identifier for the call.
    
</dd>
</dl>

<dl>
<dd>

**$assistantId:** `?string` — This will return calls with the specified assistantId.
    
</dd>
</dl>

<dl>
<dd>

**$phoneNumberId:** `?string` 

This is the phone number that will be used for the call. To use a transient number, use `phoneNumber` instead.

Only relevant for `outboundPhoneCall` and `inboundPhoneCall` type.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;create($request) -> Call|CallBatchResponse|null</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a call using an assistant or squad. The request can reference saved resources or include transient configurations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->create(
    new CreateCallDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$assistantVersion:** `?string` 

This is the assistant version to use for this call. Supported only with
direct `assistantId`. Omit to follow the latest version.
    
</dd>
</dl>

<dl>
<dd>

**$transport:** `?CreateCallDtoTransport` — This is the transport of the call.
    
</dd>
</dl>

<dl>
<dd>

**$customers:** `?array` 

This is used to issue batch calls to multiple customers.

Only relevant for `outboundPhoneCall`. To call a single customer, use `customer` instead.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the call. This is just for your own reference.
    
</dd>
</dl>

<dl>
<dd>

**$schedulePlan:** `?SchedulePlan` — This is the schedule plan of the call.
    
</dd>
</dl>

<dl>
<dd>

**$assistantId:** `?string` 

This is the assistant ID that will be used for the call. To use a transient assistant, use `assistant` instead.

To start a call with:
- Assistant, use `assistantId` or `assistant`
- Squad, use `squadId` or `squad`
- Workflow, use `workflowId` or `workflow`
    
</dd>
</dl>

<dl>
<dd>

**$assistant:** `?CreateAssistantDto` 

This is the assistant that will be used for the call. To use an existing assistant, use `assistantId` instead.

To start a call with:
- Assistant, use `assistant`
- Squad, use `squad`
- Workflow, use `workflow`
    
</dd>
</dl>

<dl>
<dd>

**$assistantOverrides:** `?AssistantOverrides` — These are the overrides for the `assistant` or `assistantId`'s settings and template variables.
    
</dd>
</dl>

<dl>
<dd>

**$squadId:** `?string` 

This is the squad that will be used for the call. To use a transient squad, use `squad` instead.

To start a call with:
- Assistant, use `assistant` or `assistantId`
- Squad, use `squad` or `squadId`
- Workflow, use `workflow` or `workflowId`
    
</dd>
</dl>

<dl>
<dd>

**$squad:** `?CreateSquadDto` 

This is a squad that will be used for the call. To use an existing squad, use `squadId` instead.

To start a call with:
- Assistant, use `assistant` or `assistantId`
- Squad, use `squad` or `squadId`
- Workflow, use `workflow` or `workflowId`
    
</dd>
</dl>

<dl>
<dd>

**$squadOverrides:** `?AssistantOverrides` 

These are the overrides for the `squad` or `squadId`'s member settings and template variables.
This will apply to all members of the squad.
    
</dd>
</dl>

<dl>
<dd>

**$workflowId:** `?string` 

This is the workflow that will be used for the call. To use a transient workflow, use `workflow` instead.

To start a call with:
- Assistant, use `assistant` or `assistantId`
- Squad, use `squad` or `squadId`
- Workflow, use `workflow` or `workflowId`
    
</dd>
</dl>

<dl>
<dd>

**$workflow:** `?CreateWorkflowDto` 

This is a workflow that will be used for the call. To use an existing workflow, use `workflowId` instead.

To start a call with:
- Assistant, use `assistant` or `assistantId`
- Squad, use `squad` or `squadId`
- Workflow, use `workflow` or `workflowId`
    
</dd>
</dl>

<dl>
<dd>

**$workflowOverrides:** `?WorkflowOverrides` — These are the overrides for the `workflow` or `workflowId`'s settings and template variables.
    
</dd>
</dl>

<dl>
<dd>

**$phoneNumberId:** `?string` 

This is the phone number that will be used for the call. To use a transient number, use `phoneNumber` instead.

Only relevant for `outboundPhoneCall` and `inboundPhoneCall` type.
    
</dd>
</dl>

<dl>
<dd>

**$phoneNumber:** `?ImportTwilioPhoneNumberDto` 

This is the phone number that will be used for the call. To use an existing number, use `phoneNumberId` instead.

Only relevant for `outboundPhoneCall` and `inboundPhoneCall` type.
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `?string` 

This is the customer that will be called. To call a transient customer , use `customer` instead.

Only relevant for `outboundPhoneCall` and `inboundPhoneCall` type.
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `?CreateCustomerDto` 

This is the customer that will be called. To call an existing customer, use `customerId` instead.

Only relevant for `outboundPhoneCall` and `inboundPhoneCall` type.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;get($id) -> ?Call</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the call identified by its ID, including its status, configuration, and available call data.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the call.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;delete($id, $request) -> ?Call</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the call identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->delete(
    'id',
    new DeleteCallDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$ids:** `?array` 

These are the Call IDs to be bulk deleted.
If provided, the call ID if any in the request query will be ignored
When requesting a bulk delete, updates when a call is deleted will be sent as a webhook to the server URL configured in the Org settings.
It may take up to a few hours to complete the bulk delete, and will be asynchronous.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;update($id, $request) -> ?Call</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the call identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->update(
    'id',
    new UpdateCallDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the call.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the call. This is just for your own reference.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;callArtifactControllerMonoRecordingDownload($id)</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->callArtifactControllerMonoRecordingDownload(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Call ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;callArtifactControllerStereoRecordingDownload($id)</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->callArtifactControllerStereoRecordingDownload(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Call ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;callArtifactControllerVideoRecordingDownload($id)</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->callArtifactControllerVideoRecordingDownload(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Call ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;callArtifactControllerCustomerRecordingDownload($id)</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->callArtifactControllerCustomerRecordingDownload(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Call ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;callArtifactControllerAssistantRecordingDownload($id)</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->callArtifactControllerAssistantRecordingDownload(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Call ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;callArtifactControllerPcapDownload($id)</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->callArtifactControllerPcapDownload(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Call ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;calls-&gt;callArtifactControllerCallLogsDownload($id)</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->calls->callArtifactControllerCallLogsDownload(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — Call ID
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Chats
<details><summary><code>$client-&gt;chats-&gt;list($request) -> ?ChatPaginatedResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chats->list(
    new ListChatsRequest([
        'assistantIdAny' => 'assistant-1,assistant-2,assistant-3',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `?string` — This is the unique identifier for the chat to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$assistantId:** `?string` — This is the unique identifier for the assistant that will be used for the chat.
    
</dd>
</dl>

<dl>
<dd>

**$assistantIdAny:** `?string` — Filter by multiple assistant IDs. Provide as comma-separated values.
    
</dd>
</dl>

<dl>
<dd>

**$squadId:** `?string` — This is the unique identifier for the squad that will be used for the chat.
    
</dd>
</dl>

<dl>
<dd>

**$sessionId:** `?string` — This is the unique identifier for the session that will be used for the chat.
    
</dd>
</dl>

<dl>
<dd>

**$previousChatId:** `?string` — This is the unique identifier for the previous chat to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$idAny:** `?string` — Filter by multiple chat IDs. Provide as comma-separated values.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;chats-&gt;create($request) -> Chat|CreateChatStreamResponse|null</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a new chat with optional SMS delivery via transport field. Requires at least one of: assistantId/assistant, sessionId, or previousChatId. Note: sessionId and previousChatId are mutually exclusive. Transport field enables SMS delivery with two modes: (1) New conversation - provide transport.phoneNumberId and transport.customer to create a new session, (2) Existing conversation - provide sessionId to use existing session data. Cannot specify both sessionId and transport fields together. The transport.useLLMGeneratedMessageForOutbound flag controls whether input is processed by LLM (true, default) or forwarded directly as SMS (false).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chats->create(
    new CreateChatDto([
        'input' => 'input',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$assistantId:** `?string` — This is the assistant that will be used for the chat. To use an existing assistant, use `assistantId` instead.
    
</dd>
</dl>

<dl>
<dd>

**$assistant:** `?CreateAssistantDto` — This is the assistant that will be used for the chat. To use an existing assistant, use `assistantId` instead.
    
</dd>
</dl>

<dl>
<dd>

**$assistantOverrides:** `?AssistantOverrides` 

These are the variable values that will be used to replace template variables in the assistant messages.
Only variable substitution is supported in chat contexts - other assistant properties cannot be overridden.
    
</dd>
</dl>

<dl>
<dd>

**$squadId:** `?string` — This is the squad that will be used for the chat. To use a transient squad, use `squad` instead.
    
</dd>
</dl>

<dl>
<dd>

**$squad:** `?CreateSquadDto` — This is the squad that will be used for the chat. To use an existing squad, use `squadId` instead.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the chat. This is just for your own reference.
    
</dd>
</dl>

<dl>
<dd>

**$sessionId:** `?string` 

This is the ID of the session that will be used for the chat.
Mutually exclusive with previousChatId.
    
</dd>
</dl>

<dl>
<dd>

**$input:** `string|array` 

This is the input text for the chat.
Can be a string or an array of chat messages.
This field is REQUIRED for chat creation.
    
</dd>
</dl>

<dl>
<dd>

**$stream:** `?bool` 

This is a flag that determines whether the response should be streamed.
When true, the response will be sent as chunks of text.
    
</dd>
</dl>

<dl>
<dd>

**$previousChatId:** `?string` 

This is the ID of the chat that will be used as context for the new chat.
The messages from the previous chat will be used as context.
Mutually exclusive with sessionId.
    
</dd>
</dl>

<dl>
<dd>

**$transport:** `?TwilioSmsChatTransport` 

This is used to send the chat through a transport like SMS.
If transport.phoneNumberId and transport.customer are provided, creates a new session.
If sessionId is provided without transport fields, uses existing session data.
Cannot specify both sessionId and transport fields (phoneNumberId/customer) together.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;chats-&gt;get($id) -> ?Chat</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chats->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;chats-&gt;delete($id) -> ?Chat</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chats->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;chats-&gt;createResponse($request) -> ResponseObject|ResponseTextDeltaEvent|ResponseTextDoneEvent|ResponseCompletedEvent|ResponseErrorEvent|null</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->chats->createResponse(
    new OpenAiResponsesRequest([
        'input' => 'input',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$assistantId:** `?string` — This is the assistant that will be used for the chat. To use an existing assistant, use `assistantId` instead.
    
</dd>
</dl>

<dl>
<dd>

**$assistant:** `?CreateAssistantDto` — This is the assistant that will be used for the chat. To use an existing assistant, use `assistantId` instead.
    
</dd>
</dl>

<dl>
<dd>

**$assistantOverrides:** `?AssistantOverrides` 

These are the variable values that will be used to replace template variables in the assistant messages.
Only variable substitution is supported in chat contexts - other assistant properties cannot be overridden.
    
</dd>
</dl>

<dl>
<dd>

**$squadId:** `?string` — This is the squad that will be used for the chat. To use a transient squad, use `squad` instead.
    
</dd>
</dl>

<dl>
<dd>

**$squad:** `?CreateSquadDto` — This is the squad that will be used for the chat. To use an existing squad, use `squadId` instead.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the chat. This is just for your own reference.
    
</dd>
</dl>

<dl>
<dd>

**$sessionId:** `?string` 

This is the ID of the session that will be used for the chat.
Mutually exclusive with previousChatId.
    
</dd>
</dl>

<dl>
<dd>

**$input:** `string|array` 

This is the input text for the chat.
Can be a string or an array of chat messages.
This field is REQUIRED for chat creation.
    
</dd>
</dl>

<dl>
<dd>

**$stream:** `?bool` — Whether to stream the response or not.
    
</dd>
</dl>

<dl>
<dd>

**$previousChatId:** `?string` 

This is the ID of the chat that will be used as context for the new chat.
The messages from the previous chat will be used as context.
Mutually exclusive with sessionId.
    
</dd>
</dl>

<dl>
<dd>

**$transport:** `?TwilioSmsChatTransport` 

This is used to send the chat through a transport like SMS.
If transport.phoneNumberId and transport.customer are provided, creates a new session.
If sessionId is provided without transport fields, uses existing session data.
Cannot specify both sessionId and transport fields (phoneNumberId/customer) together.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Campaigns
<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerFindAll($request) -> ?CampaignPaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns outbound calling campaigns for the authenticated organization. Filter results by campaign ID, status, or creation and update timestamps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerFindAll(
    new CampaignControllerFindAllRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `?string` — Filters campaigns by ID.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filters campaigns by status.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerCreate($request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates an outbound calling campaign that calls a set of customers.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerCreate(
    new CreateCampaignDto([
        'name' => 'Q2 Sales Campaign',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateCampaignDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerFindAllV2($request) -> ?CampaignSummaryPaginatedResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerFindAllV2(
    new CampaignControllerFindAllV2Request([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$includeCounters:** `?bool` 

When true, every campaign in the response includes `contactCounters` and
`callMetrics`. These are aggregate queries over contacts and events —
batched across the page, so the cost is three queries per request rather
than three per campaign, but still opt-in rather than paid for on every
read. Defaults to false.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerCreateV2($request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerCreateV2(
    new CreateCampaignDto([
        'name' => 'Q2 Sales Campaign',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateCampaignDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerFindOneV2($id, $request) -> ?CampaignSummary</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerFindOneV2(
    'id',
    new CampaignControllerFindOneV2Request([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>

<dl>
<dd>

**$includeCounters:** `?bool` 

When true, the response includes `contactCounters` and `callMetrics`.
These are aggregate queries over the campaign's contacts and events, so
they are opt-in rather than paid for on every read. Defaults to false.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerRemoveV2($id) -> ?Campaign</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerRemoveV2(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerUpdateV2($id, $request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerUpdateV2(
    'id',
    new CampaignControllerUpdateV2Request([
        'body' => new UpdateCampaignDto([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `UpdateCampaignDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerFindOne($id) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the outbound calling campaign identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerFindOne(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerRemove($id) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the outbound calling campaign identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the campaign.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerUpdate($id, $request) -> ?Campaign</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the outbound calling campaign identified by its ID. Campaigns can be ended by updating their status to `ended`.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerUpdate(
    'id',
    new CampaignControllerUpdateRequest([
        'body' => new UpdateCampaignDto([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the campaign.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `UpdateCampaignDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;campaigns-&gt;campaignControllerGetCampaignV2Contacts($id, $request) -> ?CampaignContactPaginatedResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->campaigns->campaignControllerGetCampaignV2Contacts(
    'id',
    new CampaignControllerGetCampaignV2ContactsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 

This is the status to filter contacts by. Pass once or multiple times to
filter on any of the provided statuses.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of contacts to return. Defaults to 50.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` 

This is the column to sort by. Defaults to `position` — the order contacts
were uploaded, which is also dial order.

`status` sorts by the enum's declaration order rather than alphabetically,
which means it reads as a lifecycle: pending, dispatched, completed,
failed, skipped, predial-failed.

Only columns on `campaign_contact` are sortable. Call-level values such as
cost or duration live on the call and are attached after this query, so
sorting by them here would only reorder the current page.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Sessions
<details><summary><code>$client-&gt;sessions-&gt;list($request) -> ?SessionPaginatedResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sessions->list(
    new ListSessionsRequest([
        'assistantIdAny' => 'assistant-1,assistant-2,assistant-3',
        'customerNumberAny' => '+1234567890,+0987654321',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `?string` — This is the unique identifier for the session to filter by.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 

This is the name of the customer. This is just for your own reference.

For SIP inbound calls, this is extracted from the `From` SIP header with format `"Display Name" <sip:username@domain>`.
    
</dd>
</dl>

<dl>
<dd>

**$assistantId:** `?string` — This is the ID of the assistant to filter sessions by.
    
</dd>
</dl>

<dl>
<dd>

**$assistantIdAny:** `?string` — Filter by multiple assistant IDs. Provide as comma-separated values.
    
</dd>
</dl>

<dl>
<dd>

**$squadId:** `?string` — This is the ID of the squad to filter sessions by.
    
</dd>
</dl>

<dl>
<dd>

**$workflowId:** `?string` — This is the ID of the workflow to filter sessions by.
    
</dd>
</dl>

<dl>
<dd>

**$numberE164CheckEnabled:** `?bool` 

This is the flag to toggle the E164 check for the `number` field. This is an advanced property which should be used if you know your use case requires it.

Use cases:
- `false`: To allow non-E164 numbers like `+001234567890`, `1234`, or `abc`. This is useful for dialing out to non-E164 numbers on your SIP trunks.
- `true` (default): To allow only E164 numbers like `+14155551234`. This is standard for PSTN calls.

If `false`, the `number` is still required to only contain alphanumeric characters (regex: `/^\+?[a-zA-Z0-9]+$/`).

@default true (E164 check is enabled)
    
</dd>
</dl>

<dl>
<dd>

**$extension:** `?string` — This is the extension that will be dialed after the call is answered.
    
</dd>
</dl>

<dl>
<dd>

**$assistantOverrides:** `?string` 

These are the overrides for the assistant's settings and template variables specific to this customer.
This allows customization of the assistant's behavior for individual customers in batch calls.
    
</dd>
</dl>

<dl>
<dd>

**$squadOverrides:** `?string` 

These are the overrides applied when the call targets a `squadId`. Mirrors
the call-level `squadOverrides` — use this instead of `assistantOverrides`
when the campaign or call is squad-based.
    
</dd>
</dl>

<dl>
<dd>

**$number:** `?string` — This is the number of the customer.
    
</dd>
</dl>

<dl>
<dd>

**$sipUri:** `?string` — This is the SIP URI of the customer.
    
</dd>
</dl>

<dl>
<dd>

**$email:** `?string` — This is the email of the customer.
    
</dd>
</dl>

<dl>
<dd>

**$externalId:** `?string` — This is the external ID of the customer.
    
</dd>
</dl>

<dl>
<dd>

**$customerNumberAny:** `?string` — Filter by any of the specified customer phone numbers (comma-separated).
    
</dd>
</dl>

<dl>
<dd>

**$idAny:** `?string` — Filter by multiple session IDs. Provide as comma-separated values.
    
</dd>
</dl>

<dl>
<dd>

**$phoneNumberId:** `?string` — This will return sessions with the specified phoneNumberId.
    
</dd>
</dl>

<dl>
<dd>

**$phoneNumberIdAny:** `?string` — This will return sessions with any of the specified phoneNumberIds.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sessions-&gt;create($request) -> ?Session</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sessions->create(
    new CreateSessionDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `?string` — This is a user-defined name for the session. Maximum length is 40 characters.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — This is the current status of the session. Can be either 'active' or 'completed'.
    
</dd>
</dl>

<dl>
<dd>

**$expirationSeconds:** `?float` — Session expiration time in seconds. Defaults to 24 hours (86400 seconds) if not set.
    
</dd>
</dl>

<dl>
<dd>

**$assistantId:** `?string` — This is the ID of the assistant associated with this session. Use this when referencing an existing assistant.
    
</dd>
</dl>

<dl>
<dd>

**$assistant:** `?CreateAssistantDto` 

This is the assistant configuration for this session. Use this when creating a new assistant configuration.
If assistantId is provided, this will be ignored.
    
</dd>
</dl>

<dl>
<dd>

**$assistantOverrides:** `?AssistantOverrides` 

These are the overrides for the assistant configuration.
Use this to provide variable values and other overrides when using assistantId.
Variable substitution will be applied to the assistant's messages and other text-based fields.
    
</dd>
</dl>

<dl>
<dd>

**$squadId:** `?string` — This is the squad ID associated with this session. Use this when referencing an existing squad.
    
</dd>
</dl>

<dl>
<dd>

**$squad:** `?CreateSquadDto` 

This is the squad configuration for this session. Use this when creating a new squad configuration.
If squadId is provided, this will be ignored.
    
</dd>
</dl>

<dl>
<dd>

**$messages:** `?array` — This is an array of chat messages in the session.
    
</dd>
</dl>

<dl>
<dd>

**$customer:** `?CreateCustomerDto` — This is the customer information associated with this session.
    
</dd>
</dl>

<dl>
<dd>

**$customerId:** `?string` — This is the customerId of the customer associated with this session.
    
</dd>
</dl>

<dl>
<dd>

**$phoneNumberId:** `?string` — This is the ID of the phone number associated with this session.
    
</dd>
</dl>

<dl>
<dd>

**$phoneNumber:** `?ImportTwilioPhoneNumberDto` — This is the phone number configuration for this session.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sessions-&gt;get($id) -> ?Session</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sessions->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sessions-&gt;delete($id) -> ?Session</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sessions->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;sessions-&gt;update($id, $request) -> ?Session</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->sessions->update(
    'id',
    new UpdateSessionDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the new name for the session. Maximum length is 40 characters.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — This is the new status for the session.
    
</dd>
</dl>

<dl>
<dd>

**$expirationSeconds:** `?float` — Session expiration time in seconds. Defaults to 24 hours (86400 seconds) if not set.
    
</dd>
</dl>

<dl>
<dd>

**$messages:** `?array` — This is the updated array of chat messages.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## PhoneNumbers
<details><summary><code>$client-&gt;phoneNumbers-&gt;list($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns phone numbers for the authenticated organization. Filter results by creation or update timestamps and limit the number returned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->list(
    new ListPhoneNumbersRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;create($request) -> ?CreatePhoneNumbersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a Vapi phone number or imports a phone number from a supported provider, including Twilio, Vonage, Telnyx, or a bring-your-own provider.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->create(
    CreatePhoneNumbersRequest::byoPhoneNumber(new CreateByoPhoneNumberDto([
        'credentialId' => 'credentialId',
    ])),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreatePhoneNumbersRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;phoneNumberControllerFindAllPaginated($request) -> ?PhoneNumberPaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a paginated list of phone numbers for the authenticated organization. Search by name, number, or SIP URI using a partial, case-insensitive match, and filter by creation or update timestamps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->phoneNumberControllerFindAllPaginated(
    new PhoneNumberControllerFindAllPaginatedRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$search:** `?string` — This will search phone numbers by name, number, or SIP URI (partial match, case-insensitive).
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;get($id) -> ?GetPhoneNumbersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the phone number resource identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the phone number.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;delete($id) -> ?DeletePhoneNumbersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the phone number resource identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the phone number.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;phoneNumbers-&gt;update($id, $request) -> ?UpdatePhoneNumbersResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the specified fields of the phone number resource identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->phoneNumbers->update(
    'id',
    new UpdatePhoneNumbersRequest([
        'body' => UpdatePhoneNumbersRequestBody::byoPhoneNumber(new UpdateByoPhoneNumberDto([])),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the phone number.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `UpdatePhoneNumbersRequestBody` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Tools
<details><summary><code>$client-&gt;tools-&gt;list($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns reusable tools for the authenticated organization. Filter results by creation or update timestamps and limit the number returned.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tools->list(
    new ListToolsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tools-&gt;create($request) -> ?CreateToolsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a reusable tool that assistants can invoke during conversations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tools->create(
    CreateToolsRequest::apiRequest(new CreateApiRequestToolDto([
        'method' => CreateApiRequestToolDtoMethod::Post->value,
        'url' => 'url',
    ])),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateToolsRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tools-&gt;get($id) -> ?GetToolsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the tool identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tools->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the tool.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tools-&gt;delete($id) -> ?DeleteToolsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the tool identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tools->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the tool.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tools-&gt;update($id, $request) -> ?UpdateToolsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the specified fields of the tool identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tools->update(
    'id',
    new UpdateToolsRequest([
        'body' => UpdateToolsRequestBody::apiRequest(new UpdateApiRequestToolDto([])),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the tool.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `UpdateToolsRequestBody` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Files
<details><summary><code>$client-&gt;files-&gt;list($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns files uploaded to the authenticated organization.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->files->list(
    new ListFilesRequest([
        'purpose' => 'purpose',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$purpose:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;files-&gt;create($request) -> ?File</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Uploads a file for use with a Vapi knowledge base.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->files->create(
    new CreateFileDto([
        'file' => File::createFromString("example_file", "example_file"),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;files-&gt;get($id) -> ?File</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the uploaded file identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->files->get(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the file.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;files-&gt;delete($id) -> ?File</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the uploaded file identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->files->delete(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the file.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;files-&gt;update($id, $request) -> ?File</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the name of the uploaded file identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->files->update(
    'id',
    new UpdateFileDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the file.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the file. This is just for your own reference.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## KnowledgeBasesV2
<details><summary><code>$client-&gt;knowledgeBasesV2-&gt;knowledgeBaseV2ControllerFindAll($request) -> ?array</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->knowledgeBasesV2->knowledgeBaseV2ControllerFindAll(
    new KnowledgeBaseV2ControllerFindAllRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$limit:** `?float` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;knowledgeBasesV2-&gt;knowledgeBaseV2ControllerCreate($request) -> ?KnowledgeBaseV2</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->knowledgeBasesV2->knowledgeBaseV2ControllerCreate(
    new CreateKnowledgeBaseV2Dto([
        'name' => 'name',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;knowledgeBasesV2-&gt;knowledgeBaseV2ControllerFilesGet($id) -> ?array</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->knowledgeBasesV2->knowledgeBaseV2ControllerFilesGet(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;knowledgeBasesV2-&gt;knowledgeBaseV2ControllerFileAttach($id, $request) -> ?KnowledgeBaseV2File</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->knowledgeBasesV2->knowledgeBaseV2ControllerFileAttach(
    'id',
    new AttachKnowledgeBaseV2FileDto([
        'fileId' => 'fileId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>

<dl>
<dd>

**$fileId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;knowledgeBasesV2-&gt;knowledgeBaseV2ControllerFileDetach($id, $fileId) -> ?KnowledgeBaseV2File</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->knowledgeBasesV2->knowledgeBaseV2ControllerFileDetach(
    'id',
    'fileId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>

<dl>
<dd>

**$fileId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;knowledgeBasesV2-&gt;knowledgeBaseV2ControllerFileRetry($id, $fileId) -> ?KnowledgeBaseV2File</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->knowledgeBasesV2->knowledgeBaseV2ControllerFileRetry(
    'id',
    'fileId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>

<dl>
<dd>

**$fileId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;knowledgeBasesV2-&gt;knowledgeBaseV2ControllerFindOne($id) -> ?KnowledgeBaseV2WithFiles</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->knowledgeBasesV2->knowledgeBaseV2ControllerFindOne(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;knowledgeBasesV2-&gt;knowledgeBaseV2ControllerRemove($id) -> ?KnowledgeBaseV2</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->knowledgeBasesV2->knowledgeBaseV2ControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;knowledgeBasesV2-&gt;knowledgeBaseV2ControllerUpdate($id, $request) -> ?KnowledgeBaseV2</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->knowledgeBasesV2->knowledgeBaseV2ControllerUpdate(
    'id',
    new UpdateKnowledgeBaseV2Dto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## StructuredOutputs
<details><summary><code>$client-&gt;structuredOutputs-&gt;structuredOutputControllerFindAll($request) -> ?StructuredOutputPaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns structured-output definitions for the authenticated organization. Filter results by ID, name, or creation and update timestamps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->structuredOutputs->structuredOutputControllerFindAll(
    new StructuredOutputControllerFindAllRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `?string` — This will return structured outputs where the id matches the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This will return structured outputs where the name matches the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;structuredOutputs-&gt;structuredOutputControllerCreate($request) -> ?StructuredOutput</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a reusable definition for extracting validated data from conversations using an AI model or regular expression.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->structuredOutputs->structuredOutputControllerCreate(
    new CreateStructuredOutputDto([
        'name' => 'name',
        'schema' => new JsonSchema([
            'type' => JsonSchemaType::String->value,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateStructuredOutputDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;structuredOutputs-&gt;structuredOutputControllerFindOne($id) -> ?StructuredOutput</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the structured-output definition identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->structuredOutputs->structuredOutputControllerFindOne(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the structured output.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;structuredOutputs-&gt;structuredOutputControllerRemove($id) -> ?StructuredOutput</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the structured-output definition identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->structuredOutputs->structuredOutputControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the structured output.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;structuredOutputs-&gt;structuredOutputControllerUpdate($id, $request) -> ?StructuredOutput</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the structured-output definition identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->structuredOutputs->structuredOutputControllerUpdate(
    'id',
    new UpdateStructuredOutputDto([
        'schemaOverride' => 'schemaOverride',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the structured output.
    
</dd>
</dl>

<dl>
<dd>

**$schemaOverride:** `string` — Set to the string `true` to allow changing the schema's top-level type. Other values do not enable schema type changes.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` 

This is the type of structured output.

- 'ai': Uses an LLM to extract structured data from the conversation (default).
- 'regex': Uses a regex pattern to extract data from the transcript without an LLM.
    
</dd>
</dl>

<dl>
<dd>

**$regex:** `?string` 

This is the regex pattern to match against the transcript.

Only used when type is 'regex'. Supports both raw patterns (e.g. '\d+') and
regex literal format (e.g. '/\d+/gi'). Uses RE2 syntax for safety.

The result depends on the schema type:
- boolean: true if the pattern matches, false otherwise
- string: the first match or first capture group
- number/integer: the first match parsed as a number
- array: all matches
    
</dd>
</dl>

<dl>
<dd>

**$model:** `?UpdateStructuredOutputDtoModel` 

This is the model that will be used to extract the structured output.

To provide your own custom system and user prompts for structured output extraction, populate the messages array with your system and user messages. You can specify liquid templating in your system and user messages.
Between the system or user messages, you must reference either 'transcript' or 'messages' with the `{{}}` syntax to access the conversation history.
Between the system or user messages, you must reference a variation of the structured output with the `{{}}` syntax to access the structured output definition.
i.e.:
`{{structuredOutput}}`
`{{structuredOutput.name}}`
`{{structuredOutput.description}}`
`{{structuredOutput.schema}}`

If model is not specified, GPT-4.1 will be used by default for extraction, utilizing default system and user prompts.
If messages or required fields are not specified, the default system and user prompts will be used.
    
</dd>
</dl>

<dl>
<dd>

**$compliancePlan:** `?ComplianceOverride` — Compliance configuration for this output. Only enable overrides if no sensitive data will be stored.
    
</dd>
</dl>

<dl>
<dd>

**$conditions:** `?array` — These are the conditions that gate the execution of this structured output. Every condition must pass for the structured output to run (AND semantics). When omitted or empty, no user-defined conditions gate this output. Send null to clear a previously saved gate.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the structured output.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 

This is the description of what the structured output extracts.

Use this to provide context about what data will be extracted and how it will be used.
    
</dd>
</dl>

<dl>
<dd>

**$assistantIds:** `?array` 

These are the assistant IDs that this structured output is linked to.

When linked to assistants, this structured output will be available for extraction during those assistant's calls.
    
</dd>
</dl>

<dl>
<dd>

**$workflowIds:** `?array` 

These are the workflow IDs that this structured output is linked to.

When linked to workflows, this structured output will be available for extraction during those workflow's execution.
    
</dd>
</dl>

<dl>
<dd>

**$schema:** `?JsonSchema` 

This is the JSON Schema definition for the structured output.

Defines the structure and validation rules for the data that will be extracted. Supports all JSON Schema features including:
- Objects and nested properties
- Arrays and array validation
- String, number, boolean, and null types
- Enums and const values
- Validation constraints (min/max, patterns, etc.)
- Composition with allOf, anyOf, oneOf
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;structuredOutputs-&gt;structuredOutputControllerRun($request) -> StructuredOutputControllerRunResponseZero|StructuredOutputRerunResponse|null</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Runs a saved or transient structured-output definition against one or more calls, optionally returning a preview without updating call artifacts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->structuredOutputs->structuredOutputControllerRun(
    new StructuredOutputRunDto([
        'callIds' => [
            'callIds',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$previewEnabled:** `?bool` 

This is the preview flag for the re-run. If true, the re-run will be executed and the response will be returned immediately and the call artifact will NOT be updated.
If false (default), the re-run will be executed and the response will be updated in the call artifact.
    
</dd>
</dl>

<dl>
<dd>

**$structuredOutputId:** `?string` 

This is the ID of the structured output that will be run. This must be provided unless a transient structured output is provided.
When the re-run is executed, only the value of this structured output will be replaced with the new value, or added if not present.
    
</dd>
</dl>

<dl>
<dd>

**$structuredOutput:** `?CreateStructuredOutputDto` 

This is the transient structured output that will be run. This must be provided if a structured output ID is not provided.
When the re-run is executed, the structured output value will be added to the existing artifact.
    
</dd>
</dl>

<dl>
<dd>

**$callIds:** `array` 

This is the array of callIds that will be updated with the new structured output value. If preview is true, this array must be provided and contain exactly 1 callId.
If preview is false, up to 100 callIds may be provided.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SimulationPersonalities
<details><summary><code>$client-&gt;simulationPersonalities-&gt;personalityControllerFindAll($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the personalities for the authenticated organization.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationPersonalities->personalityControllerFindAll(
    new PersonalityControllerFindAllRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationPersonalities-&gt;personalityControllerCreate($request) -> ?Personality</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a personality, the AI tester's configuration used in simulations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationPersonalities->personalityControllerCreate(
    new CreatePersonalityDto([
        'name' => 'name',
        'assistant' => new CreateAssistantDto([]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreatePersonalityDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationPersonalities-&gt;personalityControllerFindOne($id) -> ?Personality</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the specified personality.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationPersonalities->personalityControllerFindOne(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the personality.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationPersonalities-&gt;personalityControllerRemove($id) -> ?Personality</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the specified personality.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationPersonalities->personalityControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the personality.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationPersonalities-&gt;personalityControllerUpdate($id, $request) -> ?Personality</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the specified personality. Changes apply to future runs.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationPersonalities->personalityControllerUpdate(
    'id',
    new UpdatePersonalityDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the personality.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the personality.
    
</dd>
</dl>

<dl>
<dd>

**$assistant:** `?CreateAssistantDto` — This is the full assistant configuration for this personality.
    
</dd>
</dl>

<dl>
<dd>

**$path:** `?string` 

Optional folder path for organizing personalities.
Supports up to 3 levels (e.g., "dept/feature/variant").
Set to null to remove from folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SimulationScenarios
<details><summary><code>$client-&gt;simulationScenarios-&gt;scenarioControllerFindAll($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the scenarios for the authenticated organization.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationScenarios->scenarioControllerFindAll(
    new ScenarioControllerFindAllRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$idAny:** `?string` — Return only scenarios matching the provided ids
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — Search by scenario name
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationScenarios-&gt;scenarioControllerCreate($request) -> ?Scenario</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a scenario, the AI tester's intent plus the success criteria that score a run.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationScenarios->scenarioControllerCreate(
    new CreateScenarioDto([
        'name' => 'Health Enrollment - Eligible Path',
        'instructions' => 'You are calling to enroll in the Twin Health program. Confirm your identity when asked.',
        'evaluations' => [
            new EvaluationPlanItem([
                'comparator' => EvaluationPlanItemComparator::EqualTo->value,
                'value' => 1.1,
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateScenarioDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationScenarios-&gt;scenarioControllerFindOne($id) -> ?Scenario</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the specified scenario.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationScenarios->scenarioControllerFindOne(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the scenario.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationScenarios-&gt;scenarioControllerRemove($id) -> ?Scenario</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the specified scenario.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationScenarios->scenarioControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the scenario.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationScenarios-&gt;scenarioControllerUpdate($id, $request) -> ?Scenario</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the specified scenario.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationScenarios->scenarioControllerUpdate(
    'id',
    new UpdateScenarioDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the scenario.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the scenario.
    
</dd>
</dl>

<dl>
<dd>

**$instructions:** `?string` — This is the script/instructions for the tester to follow during the simulation.
    
</dd>
</dl>

<dl>
<dd>

**$evaluations:** `?array` 

This is the structured output-based evaluation plan for the simulation.
Each item defines a structured output to extract and evaluate against an expected value.
    
</dd>
</dl>

<dl>
<dd>

**$hooks:** `?array` — Hooks to run on simulation lifecycle events
    
</dd>
</dl>

<dl>
<dd>

**$targetOverrides:** `?AssistantOverrides` — Overrides to inject into the simulated target assistant or squad
    
</dd>
</dl>

<dl>
<dd>

**$toolMocks:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$path:** `?string` 

Optional folder path for organizing scenarios.
Supports up to 3 levels (e.g., "dept/feature/variant").
Set to null to remove from folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SimulationRuns
<details><summary><code>$client-&gt;simulationRuns-&gt;simulationRunControllerFindAll($request) -> array|SimulationRunsPaginatedResponse|null</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the simulation runs for the authenticated organization.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationRuns->simulationRunControllerFindAll(
    new SimulationRunControllerFindAllRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$status:** `?string` — Filter by status
    
</dd>
</dl>

<dl>
<dd>

**$filterStatus:** `?string` — Filter by aggregate run result status
    
</dd>
</dl>

<dl>
<dd>

**$targetType:** `?string` — Filter by target type
    
</dd>
</dl>

<dl>
<dd>

**$targetId:** `?string` — Filter by target id
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationRuns-&gt;simulationRunControllerCreate($request) -> ?CreateSimulationRunResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Starts a simulation run against a target assistant or squad.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationRuns->simulationRunControllerCreate(
    new CreateSimulationRunDto([
        'simulations' => [
            CreateSimulationRunDtoSimulationsItem::simulation(new SimulationRunSimulationEntry([])),
        ],
        'target' => CreateSimulationRunDtoTarget::assistant(new SimulationRunTargetAssistant([])),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$simulations:** `array` — Array of simulations and/or suites to run
    
</dd>
</dl>

<dl>
<dd>

**$target:** `CreateSimulationRunDtoTarget` — Target to test against
    
</dd>
</dl>

<dl>
<dd>

**$iterations:** `?float` — Number of times to run each simulation (default: 1)
    
</dd>
</dl>

<dl>
<dd>

**$transport:** `?SimulationRunTransportConfiguration` — Transport configuration for the simulation runs
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationRuns-&gt;simulationRunControllerFindOne($id) -> ?SimulationRun</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the specified simulation run, including its status and item counts.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationRuns->simulationRunControllerFindOne(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation run.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationRuns-&gt;simulationRunControllerCancelGroup($id) -> ?SimulationRun</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels the specified simulation run.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationRuns->simulationRunControllerCancelGroup(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation run.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationRuns-&gt;simulationRunControllerFindItems($id, $request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the run items for the specified simulation run.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationRuns->simulationRunControllerFindItems(
    'id',
    new SimulationRunControllerFindItemsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation run.
    
</dd>
</dl>

<dl>
<dd>

**$simulationId:** `?string` — Filters run items to a specific simulation.
    
</dd>
</dl>

<dl>
<dd>

**$runId:** `?string` — Filters run items to a specific run.
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` — Filters run items by status.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationRuns-&gt;simulationRunControllerFindItem($id, $itemId) -> ?SimulationRunItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the specified run item, including its evaluation results and the ID of the call that ran it.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationRuns->simulationRunControllerFindItem(
    'id',
    'itemId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation run.
    
</dd>
</dl>

<dl>
<dd>

**$itemId:** `string` — The unique identifier of the run item.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationRuns-&gt;simulationRunControllerCancelItem($id, $itemId) -> ?SimulationRunItem</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Cancels the specified run item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationRuns->simulationRunControllerCancelItem(
    'id',
    'itemId',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation run.
    
</dd>
</dl>

<dl>
<dd>

**$itemId:** `string` — The unique identifier of the run item.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationRuns-&gt;simulationRunControllerGenerateSuggestions($id, $itemId, $request)</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Generates AI suggestions for improving the assistant or squad's system prompt, tools, and scenarios, based on the specified run item.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationRuns->simulationRunControllerGenerateSuggestions(
    'id',
    'itemId',
    new SimulationRunControllerGenerateSuggestionsRequest([
        'force' => 'force',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation run.
    
</dd>
</dl>

<dl>
<dd>

**$itemId:** `string` — The unique identifier of the run item.
    
</dd>
</dl>

<dl>
<dd>

**$force:** `string` — Set to the string `true` to regenerate improvement suggestions even if they already exist.
    
</dd>
</dl>

<dl>
<dd>

**$persist:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SimulationSuites
<details><summary><code>$client-&gt;simulationSuites-&gt;simulationSuiteControllerFindAll($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the simulation suites for the authenticated organization.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationSuites->simulationSuiteControllerFindAll(
    new SimulationSuiteControllerFindAllRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `?string` — Search by simulation suite name
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationSuites-&gt;simulationSuiteControllerCreate($request) -> ?SimulationSuite</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a simulation suite, a group of simulations that run together.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationSuites->simulationSuiteControllerCreate(
    new CreateSimulationSuiteDto([
        'name' => 'Checkout Flow Tests',
        'simulationIds' => [
            'simulationIds',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` — The display name of the suite.
    
</dd>
</dl>

<dl>
<dd>

**$slackWebhookUrl:** `?string` — A Slack incoming-webhook URL notified when the suite runs.
    
</dd>
</dl>

<dl>
<dd>

**$simulationIds:** `array` — The IDs of the simulations included in the suite.
    
</dd>
</dl>

<dl>
<dd>

**$targetAssignments:** `?array` — The assistants or squads the suite's simulations run against.
    
</dd>
</dl>

<dl>
<dd>

**$path:** `?string` 

Optional folder path for organizing simulation suites.
Supports up to 3 levels (e.g., "dept/feature/variant").
Maps to GitOps resource folder structure.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationSuites-&gt;simulationSuiteControllerDuplicate($id) -> ?SimulationSuite</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationSuites->simulationSuiteControllerDuplicate(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationSuites-&gt;simulationSuiteControllerFindOne($id) -> ?SimulationSuite</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the specified simulation suite.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationSuites->simulationSuiteControllerFindOne(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation suite.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationSuites-&gt;simulationSuiteControllerRemove($id) -> ?SimulationSuite</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the specified simulation suite.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationSuites->simulationSuiteControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation suite.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulationSuites-&gt;simulationSuiteControllerUpdate($id, $request) -> ?SimulationSuite</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the specified simulation suite.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulationSuites->simulationSuiteControllerUpdate(
    'id',
    new UpdateSimulationSuiteDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation suite.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the simulation suite.
    
</dd>
</dl>

<dl>
<dd>

**$slackWebhookUrl:** `?string` — This is the Slack webhook URL for notifications.
    
</dd>
</dl>

<dl>
<dd>

**$simulationIds:** `?array` — This is the list of simulation IDs to include in the suite (replaces existing).
    
</dd>
</dl>

<dl>
<dd>

**$targetAssignments:** `?array` — Optional assistant or squad assignments (replaces existing).
    
</dd>
</dl>

<dl>
<dd>

**$path:** `?string` 

Optional folder path for organizing simulation suites.
Supports up to 3 levels (e.g., "dept/feature/variant").
Set to null to remove from folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Simulations
<details><summary><code>$client-&gt;simulations-&gt;simulationGenerateControllerGenerate($request) -> ?GenerateScenariosResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Generates scenarios for an assistant or squad by analyzing its configuration with AI.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulations->simulationGenerateControllerGenerate(
    new GenerateScenariosDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$assistantId:** `?string` — ID of the assistant to generate scenarios for
    
</dd>
</dl>

<dl>
<dd>

**$squadId:** `?string` — ID of the squad to generate scenarios for
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulations-&gt;simulationControllerFindAll($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the simulations for the authenticated organization.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulations->simulationControllerFindAll(
    new SimulationControllerFindAllRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$idAny:** `?string` — Return only simulations matching the provided ids
    
</dd>
</dl>

<dl>
<dd>

**$standaloneOnly:** `?bool` — Only include simulations that are not part of a suite
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulations-&gt;simulationControllerCreate($request) -> ?Simulation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a simulation by pairing a scenario with a personality.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulations->simulationControllerCreate(
    new CreateSimulationDto([
        'scenarioId' => 'scenarioId',
        'personalityId' => 'personalityId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `?string` — Optional display name for the simulation.
    
</dd>
</dl>

<dl>
<dd>

**$scenarioId:** `string` — The ID of the scenario to run.
    
</dd>
</dl>

<dl>
<dd>

**$personalityId:** `string` — The ID of the personality the AI tester uses.
    
</dd>
</dl>

<dl>
<dd>

**$path:** `?string` 

Optional folder path for organizing simulations.
Supports up to 3 levels (e.g., "dept/feature/variant").
Maps to GitOps resource folder structure.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulations-&gt;simulationControllerFindOne($id) -> ?Simulation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the specified simulation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulations->simulationControllerFindOne(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulations-&gt;simulationControllerRemove($id) -> ?Simulation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the specified simulation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulations->simulationControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulations-&gt;simulationControllerUpdate($id, $request) -> ?Simulation</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the specified simulation.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulations->simulationControllerUpdate(
    'id',
    new UpdateSimulationDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the simulation.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is an optional friendly name for the simulation.
    
</dd>
</dl>

<dl>
<dd>

**$scenarioId:** `?string` — This is the ID of the scenario to use for this simulation.
    
</dd>
</dl>

<dl>
<dd>

**$personalityId:** `?string` — This is the ID of the personality to use for this simulation.
    
</dd>
</dl>

<dl>
<dd>

**$path:** `?string` 

Optional folder path for organizing simulations.
Supports up to 3 levels (e.g., "dept/feature/variant").
Set to null to remove from folder.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;simulations-&gt;simulationControllerGetConcurrency() -> ?SimulationConcurrencyResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the organization's simulation concurrency limit, the number of active simulations, and how many more can start.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->simulations->simulationControllerGetConcurrency();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Insight
<details><summary><code>$client-&gt;insight-&gt;insightControllerFindAll($request) -> ?InsightPaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns saved reporting insights for the authenticated organization. Filter results by ID or creation and update timestamps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->insight->insightControllerFindAll(
    new InsightControllerFindAllRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `?string` — Filters reporting insights by ID.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;insight-&gt;insightControllerCreate($request) -> ?InsightControllerCreateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a saved reporting insight that queries call data and presents the results as a bar chart, pie chart, line chart, or text value.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->insight->insightControllerCreate(
    InsightControllerCreateRequest::bar(new CreateBarInsightFromCallTableDto([
        'queries' => [
            new JsonQueryOnCallTableWithStringTypeColumn([
                'type' => JsonQueryOnCallTableWithStringTypeColumnType::VapiqlJson->value,
                'table' => JsonQueryOnCallTableWithStringTypeColumnTable::Call->value,
                'column' => JsonQueryOnCallTableWithStringTypeColumnColumn::Id->value,
                'operation' => JsonQueryOnCallTableWithStringTypeColumnOperation::Count->value,
            ]),
        ],
    ])),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `InsightControllerCreateRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;insight-&gt;insightControllerFindOne($id) -> ?InsightControllerFindOneResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the reporting insight identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->insight->insightControllerFindOne(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the reporting insight.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;insight-&gt;insightControllerRemove($id) -> ?InsightControllerRemoveResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the reporting insight identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->insight->insightControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the reporting insight.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;insight-&gt;insightControllerUpdate($id, $request) -> ?InsightControllerUpdateResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the reporting insight identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->insight->insightControllerUpdate(
    'id',
    new InsightControllerUpdateRequest([
        'body' => InsightControllerUpdateRequestBody::bar(new UpdateBarInsightFromCallTableDto([])),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the reporting insight.
    
</dd>
</dl>

<dl>
<dd>

**$request:** `InsightControllerUpdateRequestBody` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;insight-&gt;insightControllerRun($id, $request) -> ?InsightRunResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Runs a saved reporting insight, optionally overriding its time range and response format.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->insight->insightControllerRun(
    'id',
    new InsightRunDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the reporting insight.
    
</dd>
</dl>

<dl>
<dd>

**$formatPlan:** `?InsightRunFormatPlan` — Output-formatting instructions applied to the insight run.
    
</dd>
</dl>

<dl>
<dd>

**$timeRangeOverride:** `?InsightTimeRangeWithStep` 

This is the optional time range override for the insight.
If provided, overrides every field in the insight's timeRange.
If this is provided with missing fields, defaults will be used, not the insight's timeRange.
start default - "-7d"
end default - "now"
step default - "day"
For Pie and Text Insights, step will be ignored even if provided.
    
</dd>
</dl>

<dl>
<dd>

**$assistantId:** `?string` 

Optional runtime assistant scope for dashboards.
This is applied to call-table queries without mutating the saved insight.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;insight-&gt;insightControllerPreview($request) -> ?InsightRunResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Runs an insight definition without first saving it, returning a preview of the resulting chart or text value.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->insight->insightControllerPreview(
    InsightControllerPreviewRequest::bar(new CreateBarInsightFromCallTableDto([
        'queries' => [
            new JsonQueryOnCallTableWithStringTypeColumn([
                'type' => JsonQueryOnCallTableWithStringTypeColumnType::VapiqlJson->value,
                'table' => JsonQueryOnCallTableWithStringTypeColumnTable::Call->value,
                'column' => JsonQueryOnCallTableWithStringTypeColumnColumn::Id->value,
                'operation' => JsonQueryOnCallTableWithStringTypeColumnOperation::Count->value,
            ]),
        ],
    ])),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `InsightControllerPreviewRequest` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Board
<details><summary><code>$client-&gt;board-&gt;boardControllerFindAll($request) -> ?BoardPaginatedResponse</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->board->boardControllerFindAll(
    new BoardControllerFindAllRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;board-&gt;boardControllerCreate($request) -> ?Board</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->board->boardControllerCreate(
    new CreateBoardDto([
        'name' => 'name',
        'layout' => new BoardLayout([
            'columns' => 1.1,
        ]),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$items:** `?array` — This is the contents of the Board, which is an array of objects defining the type, contents, and position of the widgets on the Board.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `string` — This is the name of the Board.
    
</dd>
</dl>

<dl>
<dd>

**$layout:** `BoardLayout` — This is the layout of the Board.
    
</dd>
</dl>

<dl>
<dd>

**$timeRangeOverride:** `?InsightTimeRangeWithStep` 

This is the timerange override for the board.
By default, individual insights have their own timerange.
This is a global override for the board which will be passed to all insights on the board.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;board-&gt;boardControllerMetricsOverviewEnsure() -> ?Board</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->board->boardControllerMetricsOverviewEnsure();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;board-&gt;boardControllerFindOne($id) -> ?Board</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->board->boardControllerFindOne(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;board-&gt;boardControllerRemove($id) -> ?Board</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->board->boardControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;board-&gt;boardControllerUpdate($id, $request) -> ?Board</code></summary>
<dl>
<dd>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->board->boardControllerUpdate(
    'id',
    new UpdateBoardDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier for the resource.
    
</dd>
</dl>

<dl>
<dd>

**$items:** `?array` — This is the contents of the Board, which is an array of objects defining the type, contents, and position of the widgets on the Board.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the Board.
    
</dd>
</dl>

<dl>
<dd>

**$layout:** `?BoardLayout` — This is the layout of the Board.
    
</dd>
</dl>

<dl>
<dd>

**$timeRangeOverride:** `?InsightTimeRangeWithStep` 

This is the timerange override for the board.
By default, individual insights have their own timerange.
This is a global override for the board which will be passed to all insights on the board.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Eval
<details><summary><code>$client-&gt;eval-&gt;evalControllerGetPaginated($request) -> ?EvalPaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns eval definitions for the authenticated organization. Filter results by ID or creation and update timestamps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->eval->evalControllerGetPaginated(
    new EvalControllerGetPaginatedRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `?string` — Filters eval definitions by ID.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;eval-&gt;evalControllerCreate($request) -> ?Eval_</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a reusable eval that defines a mock conversation and checkpoints for evaluating assistant responses and tool calls.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->eval->evalControllerCreate(
    new CreateEvalDto([
        'messages' => [
            new ChatEvalAssistantMessageMock([
                'role' => ChatEvalAssistantMessageMockRole::Assistant->value,
            ]),
        ],
        'type' => CreateEvalDtoType::ChatMockConversation->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateEvalDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;eval-&gt;evalControllerGet($id) -> ?Eval_</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the eval definition identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->eval->evalControllerGet(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the eval definition.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;eval-&gt;evalControllerRemove($id) -> ?Eval_</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the eval definition identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->eval->evalControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the eval definition.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;eval-&gt;evalControllerUpdate($id, $request) -> ?Eval_</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the eval definition identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->eval->evalControllerUpdate(
    'id',
    new UpdateEvalDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the eval definition.
    
</dd>
</dl>

<dl>
<dd>

**$messages:** `?array` 

This is the mock conversation that will be used to evaluate the flow of the conversation.

Mock Messages are used to simulate the flow of the conversation

Evaluation Messages are used as checkpoints in the flow where the model's response to previous conversation needs to be evaluated to check the content and tool calls
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 

This is the name of the eval.
It helps identify what the eval is checking for.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 

This is the description of the eval.
This helps describe the eval and its purpose in detail. It will not be used to evaluate the flow of the conversation.
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` 

This is the type of the eval.
Currently it is fixed to `chat.mockConversation`.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;eval-&gt;evalControllerGetRun($id) -> ?EvalRun</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the eval run identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->eval->evalControllerGetRun(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the eval run.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;eval-&gt;evalControllerRemoveRun($id) -> ?EvalRun</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the eval run identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->eval->evalControllerRemoveRun(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the eval run.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;eval-&gt;evalControllerGetRunsPaginated($request) -> ?EvalRunPaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns eval runs for the authenticated organization. Filter results by ID or creation and update timestamps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->eval->evalControllerGetRunsPaginated(
    new EvalControllerGetRunsPaginatedRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `?string` — Filters eval runs by ID.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;eval-&gt;evalControllerRun($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Runs a saved or transient eval against an assistant or squad and creates an eval-run record containing the results.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->eval->evalControllerRun(
    new CreateEvalRunDto([
        'target' => CreateEvalRunDtoTarget::assistant(new EvalRunTargetAssistant([])),
        'type' => CreateEvalRunDtoType::Eval_->value,
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$eval:** `?CreateEvalDto` — This is the transient eval that will be run
    
</dd>
</dl>

<dl>
<dd>

**$target:** `CreateEvalRunDtoTarget` — This is the target that will be run against the eval
    
</dd>
</dl>

<dl>
<dd>

**$type:** `string` 

This is the type of the run.
Currently it is fixed to `eval`.
    
</dd>
</dl>

<dl>
<dd>

**$evalId:** `?string` — This is the id of the eval that will be run.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## ObservabilityScorecard
<details><summary><code>$client-&gt;observabilityScorecard-&gt;scorecardControllerGet($id) -> ?Scorecard</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the scorecard identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->observabilityScorecard->scorecardControllerGet(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the scorecard.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;observabilityScorecard-&gt;scorecardControllerRemove($id) -> ?Scorecard</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the scorecard identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->observabilityScorecard->scorecardControllerRemove(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the scorecard.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;observabilityScorecard-&gt;scorecardControllerUpdate($id, $request) -> ?Scorecard</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the scorecard identified by its ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->observabilityScorecard->scorecardControllerUpdate(
    'id',
    new UpdateScorecardDto([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` — The unique identifier of the scorecard.
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` — This is the name of the scorecard. It is only for user reference and will not be used for any evaluation.
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` — This is the description of the scorecard. It is only for user reference and will not be used for any evaluation.
    
</dd>
</dl>

<dl>
<dd>

**$metrics:** `?array` 

These are the metrics that will be used to evaluate the scorecard.
Each metric will have a set of conditions and points that will be used to generate the score.
    
</dd>
</dl>

<dl>
<dd>

**$assistantIds:** `?array` 

These are the assistant IDs that this scorecard is linked to.
When linked to assistants, this scorecard will be available for evaluation during those assistants' calls.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;observabilityScorecard-&gt;scorecardControllerGetPaginated($request) -> ?ScorecardPaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns scorecards for the authenticated organization. Filter results by ID or creation and update timestamps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->observabilityScorecard->scorecardControllerGetPaginated(
    new ScorecardControllerGetPaginatedRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `?string` — Filters scorecards by ID.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;observabilityScorecard-&gt;scorecardControllerCreate($request) -> ?Scorecard</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a scorecard containing metrics, scoring conditions, and optional links to assistants whose calls should be evaluated.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->observabilityScorecard->scorecardControllerCreate(
    new CreateScorecardDto([
        'metrics' => [
            new ScorecardMetric([
                'conditions' => [
                    new NumberComparatorScorecardMetricCondition([
                        'type' => NumberComparatorScorecardMetricConditionType::Comparator->value,
                        'comparator' => NumberComparatorScorecardMetricConditionComparator::EqualTo->value,
                        'value' => 1.1,
                        'points' => 1.1,
                    ]),
                ],
                'structuredOutputId' => 'structuredOutputId',
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$request:** `CreateScorecardDto` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## ProviderResources
<details><summary><code>$client-&gt;providerResources-&gt;providerResourceControllerGetProviderResourcesPaginated($provider, $resourceName, $request) -> ?ProviderResourcePaginatedResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a paginated list of provider resources for the authenticated organization. Filter pronunciation dictionaries by provider, resource ID, or creation and update timestamps.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->providerResources->providerResourceControllerGetProviderResourcesPaginated(
    ProviderResourceControllerGetProviderResourcesPaginatedRequestProvider::Cartesia->value,
    ProviderResourceControllerGetProviderResourcesPaginatedRequestResourceName::PronunciationDictionary->value,
    new ProviderResourceControllerGetProviderResourcesPaginatedRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` — The provider (e.g., 11labs)
    
</dd>
</dl>

<dl>
<dd>

**$resourceName:** `string` — The resource name (e.g., pronunciation-dictionary)
    
</dd>
</dl>

<dl>
<dd>

**$id:** `?string` — Filters provider resources by their resource ID.
    
</dd>
</dl>

<dl>
<dd>

**$resourceId:** `?string` — Filters provider resources by their provider-specific resource ID.
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?float` — This is the page number to return. Defaults to 1.
    
</dd>
</dl>

<dl>
<dd>

**$sortOrder:** `?string` — This is the sort order for pagination. Defaults to 'DESC'.
    
</dd>
</dl>

<dl>
<dd>

**$sortBy:** `?string` — This is the column to sort by. Defaults to 'createdAt'.
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?float` — This is the maximum number of items to return. Defaults to 100.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGt:** `?DateTime` — This will return items where the createdAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLt:** `?DateTime` — This will return items where the createdAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtGe:** `?DateTime` — This will return items where the createdAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$createdAtLe:** `?DateTime` — This will return items where the createdAt is less than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGt:** `?DateTime` — This will return items where the updatedAt is greater than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLt:** `?DateTime` — This will return items where the updatedAt is less than the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtGe:** `?DateTime` — This will return items where the updatedAt is greater than or equal to the specified value.
    
</dd>
</dl>

<dl>
<dd>

**$updatedAtLe:** `?DateTime` — This will return items where the updatedAt is less than or equal to the specified value.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;providerResources-&gt;providerResourceControllerCreateProviderResource($provider, $resourceName) -> ?ProviderResource</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Creates a pronunciation-dictionary resource for a supported provider, currently Cartesia or ElevenLabs.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->providerResources->providerResourceControllerCreateProviderResource(
    ProviderResourceControllerCreateProviderResourceRequestProvider::Cartesia->value,
    ProviderResourceControllerCreateProviderResourceRequestResourceName::PronunciationDictionary->value,
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` — The provider (e.g., 11labs)
    
</dd>
</dl>

<dl>
<dd>

**$resourceName:** `string` — The resource name (e.g., pronunciation-dictionary)
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;providerResources-&gt;providerResourceControllerGetProviderResource($provider, $resourceName, $id) -> ?ProviderResource</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns the provider resource identified by its Vapi resource ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->providerResources->providerResourceControllerGetProviderResource(
    ProviderResourceControllerGetProviderResourceRequestProvider::Cartesia->value,
    ProviderResourceControllerGetProviderResourceRequestResourceName::PronunciationDictionary->value,
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` — The provider (e.g., 11labs)
    
</dd>
</dl>

<dl>
<dd>

**$resourceName:** `string` — The resource name (e.g., pronunciation-dictionary)
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier of the provider resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;providerResources-&gt;providerResourceControllerDeleteProviderResource($provider, $resourceName, $id) -> ?ProviderResource</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Deletes the provider resource identified by its Vapi resource ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->providerResources->providerResourceControllerDeleteProviderResource(
    ProviderResourceControllerDeleteProviderResourceRequestProvider::Cartesia->value,
    ProviderResourceControllerDeleteProviderResourceRequestResourceName::PronunciationDictionary->value,
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` — The provider (e.g., 11labs)
    
</dd>
</dl>

<dl>
<dd>

**$resourceName:** `string` — The resource name (e.g., pronunciation-dictionary)
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier of the provider resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;providerResources-&gt;providerResourceControllerUpdateProviderResource($provider, $resourceName, $id) -> ?ProviderResource</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Updates the provider resource identified by its Vapi resource ID.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->providerResources->providerResourceControllerUpdateProviderResource(
    ProviderResourceControllerUpdateProviderResourceRequestProvider::Cartesia->value,
    ProviderResourceControllerUpdateProviderResourceRequestResourceName::PronunciationDictionary->value,
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$provider:** `string` — The provider (e.g., 11labs)
    
</dd>
</dl>

<dl>
<dd>

**$resourceName:** `string` — The resource name (e.g., pronunciation-dictionary)
    
</dd>
</dl>

<dl>
<dd>

**$id:** `string` — The unique identifier of the provider resource.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Analytics
<details><summary><code>$client-&gt;analytics-&gt;get($request) -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Runs one or more metric queries against call or subscription data using the requested time range, groupings, and aggregate operations.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->analytics->get(
    new AnalyticsQueryDto([
        'queries' => [
            new AnalyticsQuery([
                'table' => AnalyticsQueryTable::Call->value,
                'name' => 'name',
                'operations' => [
                    new AnalyticsOperation([
                        'operation' => AnalyticsOperationOperation::Sum->value,
                        'column' => AnalyticsOperationColumn::Id->value,
                    ]),
                ],
            ]),
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$queries:** `array` — This is the list of metric queries you want to perform.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

