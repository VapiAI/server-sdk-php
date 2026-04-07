<?php

namespace Vapi\Types;

enum ExportSessionDtoFormat: string
{
    case Csv = "csv";
    case Json = "json";
}
