<?php

namespace Vapi\Types;

enum TrafficAllocationStaleConflictResponseDtoError: string
{
    case StaleAllocation = "stale_allocation";
}
