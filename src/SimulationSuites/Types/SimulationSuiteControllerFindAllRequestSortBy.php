<?php

namespace Vapi\SimulationSuites\Types;

enum SimulationSuiteControllerFindAllRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
