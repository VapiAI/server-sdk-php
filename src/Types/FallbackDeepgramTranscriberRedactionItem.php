<?php

namespace Vapi\Types;

enum FallbackDeepgramTranscriberRedactionItem: string
{
    case Pci = "pci";
    case Pii = "pii";
    case Phi = "phi";
    case Numbers = "numbers";
}
