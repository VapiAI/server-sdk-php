<?php

namespace Vapi\Types;

enum JsonQueryOnEventsTableOperation: string
{
    case Count = "count";
    case Percentage = "percentage";
}
