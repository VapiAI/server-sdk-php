<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

/**
 * This is the transport-specific message to send.
 */
class ClientInboundMessageSendTransportMessageMessage extends JsonSerializableType
{
    /**
     * @var (
     *    'vapi.sip'
     *   |'twilio'
     *   |'_unknown'
     * ) $transport
     */
    public readonly string $transport;

    /**
     * @var (
     *    VapiSipTransportMessage
     *   |TwilioTransportMessage
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   transport: (
     *    'vapi.sip'
     *   |'twilio'
     *   |'_unknown'
     * ),
     *   value: (
     *    VapiSipTransportMessage
     *   |TwilioTransportMessage
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->transport = $values['transport'];
        $this->value = $values['value'];
    }

    /**
     * @param VapiSipTransportMessage $vapiSip
     * @return ClientInboundMessageSendTransportMessageMessage
     */
    public static function vapiSip(VapiSipTransportMessage $vapiSip): ClientInboundMessageSendTransportMessageMessage
    {
        return new ClientInboundMessageSendTransportMessageMessage([
            'transport' => 'vapi.sip',
            'value' => $vapiSip,
        ]);
    }

    /**
     * @param TwilioTransportMessage $twilio
     * @return ClientInboundMessageSendTransportMessageMessage
     */
    public static function twilio(TwilioTransportMessage $twilio): ClientInboundMessageSendTransportMessageMessage
    {
        return new ClientInboundMessageSendTransportMessageMessage([
            'transport' => 'twilio',
            'value' => $twilio,
        ]);
    }

    /**
     * @return bool
     */
    public function isVapiSip(): bool
    {
        return $this->value instanceof VapiSipTransportMessage && $this->transport === 'vapi.sip';
    }

    /**
     * @return VapiSipTransportMessage
     */
    public function asVapiSip(): VapiSipTransportMessage
    {
        if (!($this->value instanceof VapiSipTransportMessage && $this->transport === 'vapi.sip')) {
            throw new Exception(
                "Expected vapi.sip; got " . $this->transport . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTwilio(): bool
    {
        return $this->value instanceof TwilioTransportMessage && $this->transport === 'twilio';
    }

    /**
     * @return TwilioTransportMessage
     */
    public function asTwilio(): TwilioTransportMessage
    {
        if (!($this->value instanceof TwilioTransportMessage && $this->transport === 'twilio')) {
            throw new Exception(
                "Expected twilio; got " . $this->transport . " with value of type " . get_debug_type($this->value),
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
        $result['transport'] = $this->transport;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->transport) {
            case 'vapi.sip':
                $value = $this->asVapiSip()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'twilio':
                $value = $this->asTwilio()->jsonSerialize();
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
        if (!array_key_exists('transport', $data)) {
            throw new Exception(
                "JSON data is missing property 'transport'",
            );
        }
        $transport = $data['transport'];
        if (!(is_string($transport))) {
            throw new Exception(
                "Expected property 'transport' in JSON data to be string, instead received " . get_debug_type($data['transport']),
            );
        }

        $args['transport'] = $transport;
        switch ($transport) {
            case 'vapi.sip':
                $args['value'] = VapiSipTransportMessage::jsonDeserialize($data);
                break;
            case 'twilio':
                $args['value'] = TwilioTransportMessage::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['transport'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
