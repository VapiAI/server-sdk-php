<?php

namespace Vapi\Types;

enum TranscriptKeyValueResultVerdict: string
{
    case Exact = "exact";
    case Near = "near";
    case Missed = "missed";
}
