<?php

namespace Vapi\Board\Types;

enum BoardControllerFindAllRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
