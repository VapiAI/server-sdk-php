<?php

namespace Vapi\Types;

enum UpdateUserRoleDtoRoleZero: string
{
    case Admin = "admin";
    case Editor = "editor";
    case Viewer = "viewer";
}
