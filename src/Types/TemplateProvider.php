<?php

namespace Vapi\Types;

enum TemplateProvider: string
{
    case Make = "make";
    case Gohighlevel = "gohighlevel";
    case Function_ = "function";
}
