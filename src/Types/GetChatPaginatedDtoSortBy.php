<?php

namespace Vapi\Types;

enum GetChatPaginatedDtoSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
