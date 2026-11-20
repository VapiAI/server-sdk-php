<?php

namespace Vapi\Types;

enum CustomerSpeechTimeoutOptionsTriggerResetMode: string
{
    case OnUserSpeech = "onUserSpeech";
    case Never = "never";
}
