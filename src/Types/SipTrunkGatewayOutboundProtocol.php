<?php

namespace Vapi\Types;

enum SipTrunkGatewayOutboundProtocol: string
{
    case TlsSrtp = "tls/srtp";
    case Tcp = "tcp";
    case Tls = "tls";
    case Udp = "udp";
}
