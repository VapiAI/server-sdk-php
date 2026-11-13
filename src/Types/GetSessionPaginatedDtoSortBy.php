<?php

namespace Vapi\Types;

enum GetSessionPaginatedDtoSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
