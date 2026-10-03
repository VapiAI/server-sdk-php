<?php

namespace Vapi\Types;

enum AudioFormatFormat: string
{
    case PcmS16Le = "pcm_s16le";
    case Mulaw = "mulaw";
}
