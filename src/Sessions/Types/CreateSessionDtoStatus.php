<?php

namespace Vapi\Sessions\Types;

enum CreateSessionDtoStatus: string
{
    case Active = "active";
    case Completed = "completed";
}
