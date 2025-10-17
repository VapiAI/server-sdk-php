<?php

namespace Vapi\Types;

enum CredentialWebhookDtoOperation: string
{
    case Creation = "creation";
    case Override = "override";
    case Refresh = "refresh";
}
