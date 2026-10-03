<?php

namespace Vapi\Types;

enum ExportChatDtoSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
