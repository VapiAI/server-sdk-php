<?php

namespace Vapi\Types;

enum KnowledgeBaseV2FileStatus: string
{
    case Indexing = "indexing";
    case Ready = "ready";
    case Failed = "failed";
}
