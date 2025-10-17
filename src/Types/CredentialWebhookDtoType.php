<?php

namespace Vapi\Types;

enum CredentialWebhookDtoType: string
{
    case Auth = "auth";
    case Sync = "sync";
    case Forward = "forward";
}
