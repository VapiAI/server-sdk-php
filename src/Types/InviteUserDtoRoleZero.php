<?php

namespace Vapi\Types;

enum InviteUserDtoRoleZero: string
{
    case Admin = "admin";
    case Editor = "editor";
    case Viewer = "viewer";
    case HipaaSpecial = "hipaa-special";
}
