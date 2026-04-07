<?php

namespace Vapi\ProviderResources\Types;

enum ProviderResourceControllerGetProviderResourceRequestProvider: string
{
    case Cartesia = "cartesia";
    case ElevenLabs = "11labs";
}
