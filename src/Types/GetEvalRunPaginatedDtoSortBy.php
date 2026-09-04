<?php

namespace Vapi\Types;

enum GetEvalRunPaginatedDtoSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
