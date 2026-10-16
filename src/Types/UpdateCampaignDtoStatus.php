<?php

namespace Vapi\Types;

enum UpdateCampaignDtoStatus: string
{
    case Ended = "ended";
    case Cancelled = "cancelled";
}
