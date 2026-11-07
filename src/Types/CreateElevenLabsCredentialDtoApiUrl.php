<?php

namespace Vapi\Types;

enum CreateElevenLabsCredentialDtoApiUrl: string
{
    case HttpsApiElevenlabsIo = "https://api.elevenlabs.io";
    case HttpsApiEuResidencyElevenlabsIo = "https://api.eu.residency.elevenlabs.io";
}
