<?php

namespace Vapi\Types;

enum CartesiaExperimentalControlsSpeedZero: string
{
    case Slowest = "slowest";
    case Slow = "slow";
    case Normal = "normal";
    case Fast = "fast";
    case Fastest = "fastest";
}
