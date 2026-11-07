<?php

namespace Vapi\Files\Types;

enum CreateFilesRequestPurpose: string
{
    case Assistant = "assistant";
    case ComposerAttachment = "composer-attachment";
    case KnowledgeBaseV2 = "knowledge-base-v2";
}
