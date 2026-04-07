<?php

namespace Vapi\Types;

enum DeepgramTranscriberModel: string
{
    case FluxGeneralEn = "flux-general-en";
    case Nova3 = "nova-3";
    case Nova3General = "nova-3-general";
    case Nova3Medical = "nova-3-medical";
    case Nova2 = "nova-2";
    case Nova2General = "nova-2-general";
    case Nova2Meeting = "nova-2-meeting";
    case Nova2Phonecall = "nova-2-phonecall";
    case Nova2Finance = "nova-2-finance";
    case Nova2Conversationalai = "nova-2-conversationalai";
    case Nova2Voicemail = "nova-2-voicemail";
    case Nova2Video = "nova-2-video";
    case Nova2Medical = "nova-2-medical";
    case Nova2Drivethru = "nova-2-drivethru";
    case Nova2Automotive = "nova-2-automotive";
    case Nova = "nova";
    case NovaGeneral = "nova-general";
    case NovaPhonecall = "nova-phonecall";
    case NovaMedical = "nova-medical";
    case Enhanced = "enhanced";
    case EnhancedGeneral = "enhanced-general";
    case EnhancedMeeting = "enhanced-meeting";
    case EnhancedPhonecall = "enhanced-phonecall";
    case EnhancedFinance = "enhanced-finance";
    case Base = "base";
    case BaseGeneral = "base-general";
    case BaseMeeting = "base-meeting";
    case BasePhonecall = "base-phonecall";
    case BaseFinance = "base-finance";
    case BaseConversationalai = "base-conversationalai";
    case BaseVoicemail = "base-voicemail";
    case BaseVideo = "base-video";
    case Whisper = "whisper";
}
