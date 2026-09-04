<?php

namespace Vapi\SimulationRuns\Types;

enum SimulationRunControllerFindAllRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
