<?php

namespace Vapi\TrafficAllocations\Types;

enum TrafficAllocationControllerMetricsGetRequestBucket: string
{
    case Hour = "hour";
    case Day = "day";
}
