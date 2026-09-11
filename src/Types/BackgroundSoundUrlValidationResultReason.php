<?php

namespace Vapi\Types;

enum BackgroundSoundUrlValidationResultReason: string
{
    case InvalidUrl = "invalid-url";
    case BlockedAddress = "blocked-address";
    case Unreachable = "unreachable";
    case Timeout = "timeout";
    case TooManyRedirects = "too-many-redirects";
    case HttpError = "http-error";
    case NotAudio = "not-audio";
}
