<?php

namespace Vapi\PhoneNumbers\Types;

enum PhoneNumberControllerFindAllPaginatedRequestSortOrder: string
{
    case Asc = "ASC";
    case Desc = "DESC";
}
