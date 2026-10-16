<?php

namespace Vapi\Types;

enum LatencyExpectationMetric: string
{
    case Turn = "turn";
    case Model = "model";
    case Voice = "voice";
}
