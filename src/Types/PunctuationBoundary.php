<?php

namespace Vapi\Types;

enum PunctuationBoundary: string
{
    case Circle = "。";
    case FullWidthComma = "，";
    case Dot = ".";
    case Exclamation = "!";
    case Question = "?";
    case Semicolon = ";";
    case Parenthesis = ")";
    case ArabicComma = "،";
    case UrduFullStop = "۔";
    case BengaliFullStop = "।";
    case DoubleDanda = "॥";
    case Pipe = "|";
    case DoublePipe = "||";
    case HalfWidthComma = ",";
    case Colon = ":";
}
