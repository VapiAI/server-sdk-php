<?php

namespace Vapi\Types;

enum RelayCommandOptionsType: string
{
    case Say = "say";
    case MessageAdd = "message.add";
}
