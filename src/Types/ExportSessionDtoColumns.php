<?php

namespace Vapi\Types;

enum ExportSessionDtoColumns: string
{
    case Id = "id";
    case Name = "name";
    case Status = "status";
    case AssistantId = "assistantId";
    case SquadId = "squadId";
    case CustomerName = "customerName";
    case CustomerNumber = "customerNumber";
    case PhoneNumberId = "phoneNumberId";
    case Cost = "cost";
    case Messages = "messages";
    case CreatedAt = "createdAt";
    case UpdatedAt = "updatedAt";
}
