<?php

namespace Vapi\Types;

enum ExportSessionDtoSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
