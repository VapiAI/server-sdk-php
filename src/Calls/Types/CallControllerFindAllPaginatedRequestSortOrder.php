<?php

namespace Vapi\Calls\Types;

enum CallControllerFindAllPaginatedRequestSortOrder: string
{
    case Asc = "ASC";
    case Desc = "DESC";
}
