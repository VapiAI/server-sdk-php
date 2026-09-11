<?php

namespace Vapi\Types;

enum SimulationRunListItemStatus: string
{
    case Queued = "queued";
    case Running = "running";
    case Ended = "ended";
}
