<?php

namespace Vapi\Types;

enum CreateWebCallDtoVideoRecordingStartMode: string
{
    case Client = "client";
    case Server = "server";
}
