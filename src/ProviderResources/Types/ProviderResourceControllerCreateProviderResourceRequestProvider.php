<?php

namespace Vapi\ProviderResources\Types;

enum ProviderResourceControllerCreateProviderResourceRequestProvider: string
{
    case Cartesia = "cartesia";
    case ElevenLabs = "11labs";
}
