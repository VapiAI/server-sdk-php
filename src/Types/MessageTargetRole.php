<?php

namespace Vapi\Types;

enum MessageTargetRole: string
{
    case User = "user";
    case Assistant = "assistant";
}
