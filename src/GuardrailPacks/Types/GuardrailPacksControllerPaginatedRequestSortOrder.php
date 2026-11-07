<?php

namespace Vapi\GuardrailPacks\Types;

enum GuardrailPacksControllerPaginatedRequestSortOrder: string
{
    case Asc = "ASC";
    case Desc = "DESC";
}
