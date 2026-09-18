<?php

namespace Vapi\Simulations\Types;

enum SimulationControllerFindAllRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
