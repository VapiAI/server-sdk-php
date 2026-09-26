<?php

namespace Vapi\Sessions\Types;

enum ListSessionsRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
