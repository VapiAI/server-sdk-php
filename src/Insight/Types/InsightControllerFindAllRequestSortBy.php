<?php

namespace Vapi\Insight\Types;

enum InsightControllerFindAllRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
