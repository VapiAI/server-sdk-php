<?php

namespace Vapi\SimulationRuns\Types;

enum SimulationRunControllerFindAllRequestFilterStatus: string
{
    case Passed = "passed";
    case Failed = "failed";
    case Running = "running";
}
