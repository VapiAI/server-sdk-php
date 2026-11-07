<?php

namespace Vapi\Types;

enum WorkflowBackgroundSoundZero: string
{
    case Off = "off";
    case Office = "office";
    case WhiteNoise = "white-noise";
    case City = "city";
    case Crowd = "crowd";
    case Farm = "farm";
}
