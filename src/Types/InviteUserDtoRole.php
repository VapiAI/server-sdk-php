<?php

namespace Vapi\Types;

enum InviteUserDtoRole: string
{
    case Admin = "admin";
    case Editor = "editor";
    case Viewer = "viewer";
}
