<?php

namespace Vapi\SimulationRuns\Types;

enum SimulationRunControllerFindAllRequestTargetType: string
{
    case Assistant = "assistant";
    case Squad = "squad";
}
