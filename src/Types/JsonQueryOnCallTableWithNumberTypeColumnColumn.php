<?php

namespace Vapi\Types;

enum JsonQueryOnCallTableWithNumberTypeColumnColumn: string
{
    case Cost = "cost";
    case Duration = "duration";
    case AverageModelLatency = "averageModelLatency";
    case AverageVoiceLatency = "averageVoiceLatency";
    case AverageTranscriberLatency = "averageTranscriberLatency";
    case AverageTurnLatency = "averageTurnLatency";
    case AverageEndpointingLatency = "averageEndpointingLatency";
    case ArtifactStructuredOutputsOutputId = "artifact.structuredOutputs[OutputID]";
}
