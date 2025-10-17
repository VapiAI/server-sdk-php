<?php

namespace Vapi\Types;

enum GladiaTranscriberLanguageBehaviour: string
{
    case Manual = "manual";
    case AutomaticSingleLanguage = "automatic single language";
    case AutomaticMultipleLanguages = "automatic multiple languages";
}
