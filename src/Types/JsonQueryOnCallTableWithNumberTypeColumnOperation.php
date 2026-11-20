<?php

namespace Vapi\Types;

enum JsonQueryOnCallTableWithNumberTypeColumnOperation: string
{
    case Count = "count";
    case Average = "average";
    case Sum = "sum";
    case Min = "min";
    case Max = "max";
}
