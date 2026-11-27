<?php

namespace Vapi\Types;

enum GuardrailPackConflictResponseDtoError: string
{
    case PackChanged = "pack_changed";
    case ImpactChanged = "impact_changed";
    case GlobalAssignment = "global_assignment";
}
