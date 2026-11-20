<?php

namespace Vapi\Types;

enum CreateGuardrailRuleDtoSensitivity: string
{
    case Low = "low";
    case Medium = "medium";
    case Aggressive = "aggressive";
}
