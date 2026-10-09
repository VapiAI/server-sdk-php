<?php

namespace Vapi\PhoneNumbers\Types;

enum PhoneNumberControllerFindAllPaginatedRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
