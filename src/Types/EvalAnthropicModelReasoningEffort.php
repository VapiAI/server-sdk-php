<?php

namespace Vapi\Types;

enum EvalAnthropicModelReasoningEffort: string
{
    case None = "none";
    case Low = "low";
    case Medium = "medium";
    case High = "high";
    case Xhigh = "xhigh";
    case Max = "max";
}
