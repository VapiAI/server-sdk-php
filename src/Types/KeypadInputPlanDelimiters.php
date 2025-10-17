<?php

namespace Vapi\Types;

enum KeypadInputPlanDelimiters: string
{
    case Hash = "#";
    case Asterisk = "*";
    case Empty = "";
}
