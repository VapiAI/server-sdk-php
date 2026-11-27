<?php

namespace Vapi\Types;

enum OpenAiReasonerModel: string
{
    case Gpt56Sol = "gpt-5.6-sol";
    case Gpt56Terra = "gpt-5.6-terra";
    case Gpt56Luna = "gpt-5.6-luna";
}
