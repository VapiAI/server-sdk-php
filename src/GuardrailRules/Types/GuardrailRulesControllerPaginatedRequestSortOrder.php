<?php

namespace Vapi\GuardrailRules\Types;

enum GuardrailRulesControllerPaginatedRequestSortOrder: string
{
    case Asc = "ASC";
    case Desc = "DESC";
}
