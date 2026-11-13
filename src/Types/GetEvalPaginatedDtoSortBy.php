<?php

namespace Vapi\Types;

enum GetEvalPaginatedDtoSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
