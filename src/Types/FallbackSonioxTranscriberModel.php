<?php

namespace Vapi\Types;

enum FallbackSonioxTranscriberModel: string
{
    case SttRtV4 = "stt-rt-v4";
    case SttRtV5 = "stt-rt-v5";
    case SttRtV6 = "stt-rt-v6";
}
