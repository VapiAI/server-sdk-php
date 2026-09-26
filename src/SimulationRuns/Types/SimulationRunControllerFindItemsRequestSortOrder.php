<?php

namespace Vapi\SimulationRuns\Types;

enum SimulationRunControllerFindItemsRequestSortOrder: string
{
    case Asc = "ASC";
    case Desc = "DESC";
}
