<?php

namespace Vapi\Types;

enum TestSuiteRunStatus: string
{
    case Queued = "queued";
    case InProgress = "in-progress";
    case Completed = "completed";
    case Failed = "failed";
}
