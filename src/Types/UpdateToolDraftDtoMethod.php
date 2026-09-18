<?php

namespace Vapi\Types;

enum UpdateToolDraftDtoMethod: string
{
    case Post = "POST";
    case Get = "GET";
    case Put = "PUT";
    case Patch = "PATCH";
    case Delete = "DELETE";
}
