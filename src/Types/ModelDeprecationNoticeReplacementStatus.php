<?php

namespace Vapi\Types;

enum ModelDeprecationNoticeReplacementStatus: string
{
    case Available = "available";
    case ManualActionRequired = "manual-action-required";
}
