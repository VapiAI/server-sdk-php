<?php

namespace Vapi\Types;

enum WorkflowOpenAiModelReasoningEffort: string
{
    case Minimal = "minimal";
    case None = "none";
    case Low = "low";
    case Medium = "medium";
    case High = "high";
    case Xhigh = "xhigh";
}
