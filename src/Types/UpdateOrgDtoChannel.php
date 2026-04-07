<?php

namespace Vapi\Types;

enum UpdateOrgDtoChannel: string
{
    case Daily = "daily";
    case Default_ = "default";
    case Weekly = "weekly";
    case Intuit = "intuit";
    case Hcs = "hcs";
}
