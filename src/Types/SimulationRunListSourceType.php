<?php

namespace Vapi\Types;

enum SimulationRunListSourceType: string
{
    case Suite = "suite";
    case Simulation = "simulation";
    case AdHoc = "adHoc";
    case Api = "api";
}
