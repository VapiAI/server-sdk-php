<?php

namespace Vapi\Sessions\Types;

enum UpdateSessionDtoStatus: string
{
    case Active = "active";
    case Completed = "completed";
}
