<?php

namespace Vapi\Types;

enum EvalRunResultStatus: string
{
    case Pass = "pass";
    case Fail = "fail";
}
