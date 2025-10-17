<?php

namespace Vapi\Types;

enum TransferMode: string
{
    case RollingHistory = "rolling-history";
    case SwapSystemMessageInHistory = "swap-system-message-in-history";
}
