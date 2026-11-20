<?php

namespace Vapi\SimulationPersonalities\Types;

enum PersonalityControllerFindAllRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
