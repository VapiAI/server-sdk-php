<?php

namespace Vapi\Types;

enum RelayResponseStatus: string
{
    case DeliveredLive = "deliveredLive";
    case DeliveredHeadless = "deliveredHeadless";
    case Failed = "failed";
}
