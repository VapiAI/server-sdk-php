<?php

namespace Vapi\Sessions\Types;

enum ListSessionsRequestSortOrder: string
{
    case Asc = "ASC";
    case Desc = "DESC";
}
