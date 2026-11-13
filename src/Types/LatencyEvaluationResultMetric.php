<?php

namespace Vapi\Types;

enum LatencyEvaluationResultMetric: string
{
    case Turn = "turn";
    case Model = "model";
    case Voice = "voice";
    case Transcriber = "transcriber";
    case Endpointing = "endpointing";
}
