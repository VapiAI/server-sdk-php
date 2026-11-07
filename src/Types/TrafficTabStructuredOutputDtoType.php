<?php

namespace Vapi\Types;

enum TrafficTabStructuredOutputDtoType: string
{
    case Number = "number";
    case String = "string";
    case Boolean = "boolean";
    case Unknown = "unknown";
}
