<?php

namespace Vapi\Types;

enum SessionStatus: string
{
    case Active = "active";
    case Completed = "completed";
}
