<?php

namespace Vapi\ObservabilityScorecard\Types;

enum ScorecardControllerGetPaginatedRequestSortOrder: string
{
    case Asc = "ASC";
    case Desc = "DESC";
}
