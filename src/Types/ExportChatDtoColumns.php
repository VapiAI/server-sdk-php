<?php

namespace Vapi\Types;

enum ExportChatDtoColumns: string
{
    case Id = "id";
    case AssistantId = "assistantId";
    case SquadId = "squadId";
    case SessionId = "sessionId";
    case PreviousChatId = "previousChatId";
    case Cost = "cost";
    case Messages = "messages";
    case Output = "output";
    case CreatedAt = "createdAt";
    case UpdatedAt = "updatedAt";
}
