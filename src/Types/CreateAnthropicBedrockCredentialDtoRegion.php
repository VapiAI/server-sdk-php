<?php

namespace Vapi\Types;

enum CreateAnthropicBedrockCredentialDtoRegion: string
{
    case UsEast1 = "us-east-1";
    case UsWest2 = "us-west-2";
    case EuWest1 = "eu-west-1";
    case EuWest3 = "eu-west-3";
    case ApNortheast1 = "ap-northeast-1";
    case ApSoutheast2 = "ap-southeast-2";
}
