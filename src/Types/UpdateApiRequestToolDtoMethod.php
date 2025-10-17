<?php

namespace Vapi\Types;

enum UpdateApiRequestToolDtoMethod: string
{
    case Post = "POST";
    case Get = "GET";
    case Put = "PUT";
    case Patch = "PATCH";
    case Delete = "DELETE";
}
