<?php

namespace Vapi\Types;

enum CallArtifactUploadItemType: string
{
    case EndOfCallReport = "end-of-call-report";
    case RecordingMono = "recording-mono";
    case RecordingStereo = "recording-stereo";
    case RecordingAssistant = "recording-assistant";
    case RecordingCustomer = "recording-customer";
    case Log = "log";
    case Pcap = "pcap";
}
