<?php

namespace Vapi\Types;

enum UpdateWorkflowDtoBackgroundSoundZero: string
{
    case Off = "off";
    case Office = "office";
    case WhiteNoise = "white-noise";
    case City = "city";
    case Crowd = "crowd";
    case Farm = "farm";
}
