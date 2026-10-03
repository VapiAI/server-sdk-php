<?php

namespace Vapi\SimulationScenarios\Types;

enum ScenarioControllerFindAllRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
