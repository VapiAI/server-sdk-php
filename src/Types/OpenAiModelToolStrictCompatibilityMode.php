<?php

namespace Vapi\Types;

enum OpenAiModelToolStrictCompatibilityMode: string
{
    case StripParametersWithUnsupportedValidation = "strip-parameters-with-unsupported-validation";
    case StripUnsupportedValidation = "strip-unsupported-validation";
}
