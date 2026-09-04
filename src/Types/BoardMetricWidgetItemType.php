<?php

namespace Vapi\Types;

enum BoardMetricWidgetItemType: string
{
    case FailedCallsList = "failed_calls_list";
    case ConcurrencyChart = "concurrency_chart";
    case AverageCostBreakdownChart = "average_cost_breakdown_chart";
}
