<?php

namespace Vapi\Types;

enum GuardrailRuleSensitivity: string
{
    case Low = "low";
    case Medium = "medium";
    case Aggressive = "aggressive";
}
