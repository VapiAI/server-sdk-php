<?php

namespace Vapi\Types;

enum ResponseOutputMessageStatus: string
{
    case InProgress = "in_progress";
    case Completed = "completed";
    case Incomplete = "incomplete";
}
