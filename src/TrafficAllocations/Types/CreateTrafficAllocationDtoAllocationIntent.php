<?php

namespace Vapi\TrafficAllocations\Types;

enum CreateTrafficAllocationDtoAllocationIntent: string
{
    case FollowLatest = "follow-latest";
    case Explicit = "explicit";
}
