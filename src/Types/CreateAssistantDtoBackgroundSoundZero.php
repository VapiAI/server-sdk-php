<?php

namespace Vapi\Types;

enum CreateAssistantDtoBackgroundSoundZero: string
{
    case Off = "off";
    case Office = "office";
    case WhiteNoise = "white-noise";
    case City = "city";
    case Crowd = "crowd";
    case Farm = "farm";
}
