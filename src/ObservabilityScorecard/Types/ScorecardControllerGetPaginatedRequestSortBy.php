<?php

namespace Vapi\ObservabilityScorecard\Types;

enum ScorecardControllerGetPaginatedRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
