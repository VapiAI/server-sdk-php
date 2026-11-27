<?php

namespace Vapi\Types;

enum LatencyEvaluationResultAggregation: string
{
    case Mean = "mean";
    case Median = "median";
    case P95 = "p95";
    case Max = "max";
}
