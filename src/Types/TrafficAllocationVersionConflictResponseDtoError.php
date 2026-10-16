<?php

namespace Vapi\Types;

enum TrafficAllocationVersionConflictResponseDtoError: string
{
    case VersionInGoverningAllocation = "version_in_governing_allocation";
}
