<?php

namespace Vapi\TrafficAllocations\Types;

enum TrafficAllocationControllerFindAllPaginatedRequestSortOrder: string
{
    case Asc = "ASC";
    case Desc = "DESC";
}
