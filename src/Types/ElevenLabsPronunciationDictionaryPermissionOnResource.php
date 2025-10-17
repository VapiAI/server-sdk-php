<?php

namespace Vapi\Types;

enum ElevenLabsPronunciationDictionaryPermissionOnResource: string
{
    case Admin = "admin";
    case Editor = "editor";
    case Viewer = "viewer";
}
