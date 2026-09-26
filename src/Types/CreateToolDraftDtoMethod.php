<?php

namespace Vapi\Types;

enum CreateToolDraftDtoMethod: string
{
    case Post = "POST";
    case Get = "GET";
    case Put = "PUT";
    case Patch = "PATCH";
    case Delete = "DELETE";
}
