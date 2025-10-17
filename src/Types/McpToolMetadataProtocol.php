<?php

namespace Vapi\Types;

enum McpToolMetadataProtocol: string
{
    case Sse = "sse";
    case Shttp = "shttp";
}
