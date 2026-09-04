<?php

namespace Vapi\Types;

enum FallbackVapiVoiceVersion: string
{
    case One = "1";
    case Two = "2";
    case Latest = "latest";
}
