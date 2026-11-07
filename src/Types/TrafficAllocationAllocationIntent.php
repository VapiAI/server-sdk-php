<?php

namespace Vapi\Types;

enum TrafficAllocationAllocationIntent: string
{
    case FollowLatest = "follow-latest";
    case Explicit = "explicit";
}
