<?php

namespace Vapi\Types;

enum UpdateUserRoleDtoRole: string
{
    case Admin = "admin";
    case Editor = "editor";
    case Viewer = "viewer";
}
