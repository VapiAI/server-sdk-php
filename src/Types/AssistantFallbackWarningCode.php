<?php

namespace Vapi\Types;

enum AssistantFallbackWarningCode: string
{
    case FallbackVoicesEmpty = "fallback-voices-empty";
    case FallbackVoiceSameProvider = "fallback-voice-same-provider";
    case FallbackVoiceLanguageUnsupported = "fallback-voice-language-unsupported";
    case FallbackVoiceInvalid = "fallback-voice-invalid";
    case FallbackTranscribersEmpty = "fallback-transcribers-empty";
    case FallbackTranscriberSameProvider = "fallback-transcriber-same-provider";
    case FallbackTranscriberLanguageUnsupported = "fallback-transcriber-language-unsupported";
}
