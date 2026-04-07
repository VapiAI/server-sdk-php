<?php

namespace Vapi\Assistants\Types;

enum UpdateAssistantDtoClientMessagesItem: string
{
    case ConversationUpdate = "conversation-update";
    case AssistantSpeechStarted = "assistant.speechStarted";
    case FunctionCall = "function-call";
    case FunctionCallResult = "function-call-result";
    case Hang = "hang";
    case LanguageChanged = "language-changed";
    case Metadata = "metadata";
    case ModelOutput = "model-output";
    case SpeechUpdate = "speech-update";
    case StatusUpdate = "status-update";
    case Transcript = "transcript";
    case ToolCalls = "tool-calls";
    case ToolCallsResult = "tool-calls-result";
    case ToolCompleted = "tool.completed";
    case TransferUpdate = "transfer-update";
    case UserInterrupted = "user-interrupted";
    case VoiceInput = "voice-input";
    case WorkflowNodeStarted = "workflow.node.started";
    case AssistantStarted = "assistant.started";
}
