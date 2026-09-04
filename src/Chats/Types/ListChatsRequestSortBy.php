<?php

namespace Vapi\Chats\Types;

enum ListChatsRequestSortBy: string
{
    case CreatedAt = "createdAt";
    case Duration = "duration";
    case Cost = "cost";
}
