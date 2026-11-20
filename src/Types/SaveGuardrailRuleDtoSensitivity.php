<?php

namespace Vapi\Types;

enum SaveGuardrailRuleDtoSensitivity: string
{
    case Low = "low";
    case Medium = "medium";
    case Aggressive = "aggressive";
}
