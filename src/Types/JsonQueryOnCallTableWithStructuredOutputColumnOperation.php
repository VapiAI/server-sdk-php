<?php

namespace Vapi\Types;

enum JsonQueryOnCallTableWithStructuredOutputColumnOperation: string
{
    case Average = "average";
    case Count = "count";
    case Sum = "sum";
    case Min = "min";
    case Max = "max";
}
