<?php

namespace Vapi\Types;

enum ClientInboundMessageAppendContextKind: string
{
    case Commentary = "commentary";
    case Thinking = "thinking";
    case Instructions = "instructions";
}
