<?php

namespace Vapi\Types;

enum JsonQueryOnCallTableWithNumberTypeColumnOperation: string
{
    case Average = "average";
    case Sum = "sum";
    case Min = "min";
    case Max = "max";
}
