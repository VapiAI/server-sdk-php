<?php

namespace Vapi\Types;

enum GuardrailRuleSnapshotSensitivity: string
{
    case Low = "low";
    case Medium = "medium";
    case Aggressive = "aggressive";
}
