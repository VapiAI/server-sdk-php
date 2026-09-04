<?php

namespace Vapi\Eval\Types;

enum EvalControllerGetPaginatedRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
