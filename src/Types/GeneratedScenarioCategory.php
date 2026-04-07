<?php

namespace Vapi\Types;

enum GeneratedScenarioCategory: string
{
    case HappyPath = "happy_path";
    case EdgeCase = "edge_case";
    case FailureMode = "failure_mode";
}
