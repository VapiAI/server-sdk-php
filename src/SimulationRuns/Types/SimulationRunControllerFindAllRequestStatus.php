<?php

namespace Vapi\SimulationRuns\Types;

enum SimulationRunControllerFindAllRequestStatus: string
{
    case Queued = "queued";
    case Running = "running";
    case Ended = "ended";
}
