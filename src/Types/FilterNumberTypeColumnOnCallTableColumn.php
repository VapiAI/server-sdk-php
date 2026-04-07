<?php

namespace Vapi\Types;

enum FilterNumberTypeColumnOnCallTableColumn: string
{
    case Duration = "duration";
    case Cost = "cost";
    case AverageModelLatency = "averageModelLatency";
    case AverageVoiceLatency = "averageVoiceLatency";
    case AverageTranscriberLatency = "averageTranscriberLatency";
    case AverageTurnLatency = "averageTurnLatency";
    case AverageEndpointingLatency = "averageEndpointingLatency";
}
