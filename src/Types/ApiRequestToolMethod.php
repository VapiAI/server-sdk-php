<?php

namespace Vapi\Types;

enum ApiRequestToolMethod: string
{
    case Post = "POST";
    case Get = "GET";
    case Put = "PUT";
    case Patch = "PATCH";
    case Delete = "DELETE";
}
