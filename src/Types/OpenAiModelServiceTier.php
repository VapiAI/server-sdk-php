<?php

namespace Vapi\Types;

enum OpenAiModelServiceTier: string
{
    case Auto = "auto";
    case Default_ = "default";
    case Fast = "fast";
    case Priority = "priority";
}
