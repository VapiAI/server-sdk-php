<?php

namespace Vapi\Types;

enum DeepgramTranscriberRedactionItem: string
{
    case Pci = "pci";
    case Pii = "pii";
    case Phi = "phi";
    case Numbers = "numbers";
}
