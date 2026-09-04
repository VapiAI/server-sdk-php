<?php

namespace Vapi\Types;

enum UpdateToolDraftDtoType: string
{
    case Dtmf = "dtmf";
    case EndCall = "endCall";
    case KnowledgeBase = "knowledgeBase";
    case TransferCall = "transferCall";
    case TransferCancel = "transferCancel";
    case TransferSuccessful = "transferSuccessful";
    case Handoff = "handoff";
    case Output = "output";
    case Voicemail = "voicemail";
    case Query = "query";
    case Sms = "sms";
    case SipRequest = "sipRequest";
    case Function_ = "function";
    case Mcp = "mcp";
    case ApiRequest = "apiRequest";
    case Code = "code";
    case Bash = "bash";
    case Computer = "computer";
    case TextEditor = "textEditor";
    case GoogleCalendarEventCreate = "google.calendar.event.create";
    case GoogleCalendarAvailabilityCheck = "google.calendar.availability.check";
    case GoogleSheetsRowAppend = "google.sheets.row.append";
    case SlackMessageSend = "slack.message.send";
    case GohighlevelCalendarEventCreate = "gohighlevel.calendar.event.create";
    case GohighlevelCalendarAvailabilityCheck = "gohighlevel.calendar.availability.check";
    case GohighlevelContactCreate = "gohighlevel.contact.create";
    case GohighlevelContactGet = "gohighlevel.contact.get";
    case Make = "make";
    case Ghl = "ghl";
}
