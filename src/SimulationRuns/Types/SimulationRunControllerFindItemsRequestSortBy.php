<?php

namespace Vapi\SimulationRuns\Types;

enum SimulationRunControllerFindItemsRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
