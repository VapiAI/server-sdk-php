<?php

namespace Vapi\Types;

enum SimulationRunStatus: string
{
    case Queued = "queued";
    case Running = "running";
    case Ended = "ended";
}
