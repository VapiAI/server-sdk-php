<?php

namespace Vapi\Types;

enum UserMessageConfidenceSource: string
{
    case Provider = "provider";
    case Derived = "derived";
}
