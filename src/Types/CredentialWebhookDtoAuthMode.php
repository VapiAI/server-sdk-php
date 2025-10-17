<?php

namespace Vapi\Types;

enum CredentialWebhookDtoAuthMode: string
{
    case Oauth2 = "OAUTH2";
    case ApiKey = "API_KEY";
    case Basic = "BASIC";
}
