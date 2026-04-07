<?php

namespace Vapi\Types;

enum ElevenLabsTranscriberModel: string
{
    case ScribeV1 = "scribe_v1";
    case ScribeV2 = "scribe_v2";
    case ScribeV2Realtime = "scribe_v2_realtime";
}
