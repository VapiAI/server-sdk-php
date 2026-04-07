<?php

namespace Vapi\Types;

enum JsonQueryOnCallTableWithStringTypeColumnColumn: string
{
    case Id = "id";
    case ArtifactStructuredOutputsOutputId = "artifact.structuredOutputs[OutputID]";
}
