<?php

namespace Vapi\Types;

enum RegexOptionType: string
{
    case IgnoreCase = "ignore-case";
    case WholeWord = "whole-word";
    case MultiLine = "multi-line";
}
