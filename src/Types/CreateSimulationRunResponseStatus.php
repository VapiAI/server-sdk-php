<?php

namespace Vapi\Types;

enum CreateSimulationRunResponseStatus: string
{
    case Queued = "queued";
    case Running = "running";
    case Ended = "ended";
}
