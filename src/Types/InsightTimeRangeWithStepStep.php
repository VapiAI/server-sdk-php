<?php

namespace Vapi\Types;

enum InsightTimeRangeWithStepStep: string
{
    case Minute = "minute";
    case Hour = "hour";
    case Day = "day";
    case Week = "week";
    case Month = "month";
    case Quarter = "quarter";
    case Year = "year";
}
