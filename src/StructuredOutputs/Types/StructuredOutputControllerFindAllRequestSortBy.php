<?php

namespace Vapi\StructuredOutputs\Types;

enum StructuredOutputControllerFindAllRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
