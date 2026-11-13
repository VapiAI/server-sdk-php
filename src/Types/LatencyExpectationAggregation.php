<?php

namespace Vapi\Types;

enum LatencyExpectationAggregation: string
{
    case Mean = "mean";
    case Median = "median";
    case P95 = "p95";
    case Max = "max";
}
