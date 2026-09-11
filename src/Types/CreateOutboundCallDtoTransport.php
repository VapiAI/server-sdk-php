<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

/**
 * This is the transport of the call.
 */
class CreateOutboundCallDtoTransport extends JsonSerializableType
{
    /**
     * @var (
     *    'vapi.websocket'
     *   |'vonage'
     *   |'twilio'
     *   |'vapi.sip'
     *   |'telnyx'
     *   |'daily'
     *   |'_unknown'
     * ) $provider
     */
    public readonly string $provider;

    /**
     * @var (
     *    VapiWebsocketTransport
     *   |VonageTransport
     *   |TwilioTransport
     *   |VapiSipTransport
     *   |TelnyxTransport
     *   |VapiWebCallTransport
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   provider: (
     *    'vapi.websocket'
     *   |'vonage'
     *   |'twilio'
     *   |'vapi.sip'
     *   |'telnyx'
     *   |'daily'
     *   |'_unknown'
     * ),
     *   value: (
     *    VapiWebsocketTransport
     *   |VonageTransport
     *   |TwilioTransport
     *   |VapiSipTransport
     *   |TelnyxTransport
     *   |VapiWebCallTransport
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->provider = $values['provider'];
        $this->value = $values['value'];
    }

    /**
     * @param VapiWebsocketTransport $vapiWebsocket
     * @return CreateOutboundCallDtoTransport
     */
    public static function vapiWebsocket(VapiWebsocketTransport $vapiWebsocket): CreateOutboundCallDtoTransport
    {
        return new CreateOutboundCallDtoTransport([
            'provider' => 'vapi.websocket',
            'value' => $vapiWebsocket,
        ]);
    }

    /**
     * @param VonageTransport $vonage
     * @return CreateOutboundCallDtoTransport
     */
    public static function vonage(VonageTransport $vonage): CreateOutboundCallDtoTransport
    {
        return new CreateOutboundCallDtoTransport([
            'provider' => 'vonage',
            'value' => $vonage,
        ]);
    }

    /**
     * @param TwilioTransport $twilio
     * @return CreateOutboundCallDtoTransport
     */
    public static function twilio(TwilioTransport $twilio): CreateOutboundCallDtoTransport
    {
        return new CreateOutboundCallDtoTransport([
            'provider' => 'twilio',
            'value' => $twilio,
        ]);
    }

    /**
     * @param VapiSipTransport $vapiSip
     * @return CreateOutboundCallDtoTransport
     */
    public static function vapiSip(VapiSipTransport $vapiSip): CreateOutboundCallDtoTransport
    {
        return new CreateOutboundCallDtoTransport([
            'provider' => 'vapi.sip',
            'value' => $vapiSip,
        ]);
    }

    /**
     * @param TelnyxTransport $telnyx
     * @return CreateOutboundCallDtoTransport
     */
    public static function telnyx(TelnyxTransport $telnyx): CreateOutboundCallDtoTransport
    {
        return new CreateOutboundCallDtoTransport([
            'provider' => 'telnyx',
            'value' => $telnyx,
        ]);
    }

    /**
     * @param VapiWebCallTransport $daily
     * @return CreateOutboundCallDtoTransport
     */
    public static function daily(VapiWebCallTransport $daily): CreateOutboundCallDtoTransport
    {
        return new CreateOutboundCallDtoTransport([
            'provider' => 'daily',
            'value' => $daily,
        ]);
    }

    /**
     * @return bool
     */
    public function isVapiWebsocket(): bool
    {
        return $this->value instanceof VapiWebsocketTransport && $this->provider === 'vapi.websocket';
    }

    /**
     * @return VapiWebsocketTransport
     */
    public function asVapiWebsocket(): VapiWebsocketTransport
    {
        if (!($this->value instanceof VapiWebsocketTransport && $this->provider === 'vapi.websocket')) {
            throw new Exception(
                "Expected vapi.websocket; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isVonage(): bool
    {
        return $this->value instanceof VonageTransport && $this->provider === 'vonage';
    }

    /**
     * @return VonageTransport
     */
    public function asVonage(): VonageTransport
    {
        if (!($this->value instanceof VonageTransport && $this->provider === 'vonage')) {
            throw new Exception(
                "Expected vonage; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTwilio(): bool
    {
        return $this->value instanceof TwilioTransport && $this->provider === 'twilio';
    }

    /**
     * @return TwilioTransport
     */
    public function asTwilio(): TwilioTransport
    {
        if (!($this->value instanceof TwilioTransport && $this->provider === 'twilio')) {
            throw new Exception(
                "Expected twilio; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isVapiSip(): bool
    {
        return $this->value instanceof VapiSipTransport && $this->provider === 'vapi.sip';
    }

    /**
     * @return VapiSipTransport
     */
    public function asVapiSip(): VapiSipTransport
    {
        if (!($this->value instanceof VapiSipTransport && $this->provider === 'vapi.sip')) {
            throw new Exception(
                "Expected vapi.sip; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTelnyx(): bool
    {
        return $this->value instanceof TelnyxTransport && $this->provider === 'telnyx';
    }

    /**
     * @return TelnyxTransport
     */
    public function asTelnyx(): TelnyxTransport
    {
        if (!($this->value instanceof TelnyxTransport && $this->provider === 'telnyx')) {
            throw new Exception(
                "Expected telnyx; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDaily(): bool
    {
        return $this->value instanceof VapiWebCallTransport && $this->provider === 'daily';
    }

    /**
     * @return VapiWebCallTransport
     */
    public function asDaily(): VapiWebCallTransport
    {
        if (!($this->value instanceof VapiWebCallTransport && $this->provider === 'daily')) {
            throw new Exception(
                "Expected daily; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * @return array<mixed>
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $result['provider'] = $this->provider;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->provider) {
            case 'vapi.websocket':
                $value = $this->asVapiWebsocket()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'vonage':
                $value = $this->asVonage()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'twilio':
                $value = $this->asTwilio()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'vapi.sip':
                $value = $this->asVapiSip()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'telnyx':
                $value = $this->asTelnyx()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'daily':
                $value = $this->asDaily()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '_unknown':
            default:
                if (is_null($this->value)) {
                    break;
                }
                if ($this->value instanceof JsonSerializableType) {
                    $value = $this->value->jsonSerialize();
                    $result = array_merge($value, $result);
                } elseif (is_array($this->value)) {
                    $result = array_merge($this->value, $result);
                }
        }

        return $result;
    }

    /**
     * @param string $json
     */
    public static function fromJson(string $json): static
    {
        $decodedJson = JsonDecoder::decode($json);
        if (!is_array($decodedJson)) {
            throw new Exception("Unexpected non-array decoded type: " . gettype($decodedJson));
        }
        return self::jsonDeserialize($decodedJson);
    }

    /**
     * @param array<string, mixed> $data
     */
    public static function jsonDeserialize(array $data): static
    {
        $args = [];
        if (!array_key_exists('provider', $data)) {
            throw new Exception(
                "JSON data is missing property 'provider'",
            );
        }
        $provider = $data['provider'];
        if (!(is_string($provider))) {
            throw new Exception(
                "Expected property 'provider' in JSON data to be string, instead received " . get_debug_type($data['provider']),
            );
        }

        $args['provider'] = $provider;
        switch ($provider) {
            case 'vapi.websocket':
                $args['value'] = VapiWebsocketTransport::jsonDeserialize($data);
                break;
            case 'vonage':
                $args['value'] = VonageTransport::jsonDeserialize($data);
                break;
            case 'twilio':
                $args['value'] = TwilioTransport::jsonDeserialize($data);
                break;
            case 'vapi.sip':
                $args['value'] = VapiSipTransport::jsonDeserialize($data);
                break;
            case 'telnyx':
                $args['value'] = TelnyxTransport::jsonDeserialize($data);
                break;
            case 'daily':
                $args['value'] = VapiWebCallTransport::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['provider'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
