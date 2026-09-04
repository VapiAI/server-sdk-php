<?php

namespace Vapi\SimulationRuns\Types;

enum SimulationRunControllerFindItemsRequestStatus: string
{
    case Queued = "queued";
    case Running = "running";
    case Evaluating = "evaluating";
    case Passed = "passed";
    case Failed = "failed";
    case Canceled = "canceled";
}
