<?php

namespace Vapi\Types;

enum XaiModelModel: string
{
    case GrokBeta = "grok-beta";
    case Grok2 = "grok-2";
    case Grok3 = "grok-3";
    case Grok4FastReasoning = "grok-4-fast-reasoning";
    case Grok4FastNonReasoning = "grok-4-fast-non-reasoning";
    case Grok4200309Reasoning = "grok-4.20-0309-reasoning";
    case Grok4200309NonReasoning = "grok-4.20-0309-non-reasoning";
    case Grok43 = "grok-4.3";
}
