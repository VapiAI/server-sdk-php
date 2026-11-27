<?php

namespace Vapi\ProviderResources\Types;

enum ProviderResourceControllerGetProviderResourcesPaginatedRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
