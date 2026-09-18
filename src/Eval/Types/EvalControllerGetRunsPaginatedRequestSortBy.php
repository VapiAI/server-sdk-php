<?php

namespace Vapi\Eval\Types;

enum EvalControllerGetRunsPaginatedRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
