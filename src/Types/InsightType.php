<?php

namespace Vapi\Types;

enum InsightType: string
{
    case Bar = "bar";
    case Line = "line";
    case Pie = "pie";
    case Text = "text";
}
