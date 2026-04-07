<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

/**
 * The public key configuration.
 */
class PublicKeyEncryptionPlanPublicKey extends JsonSerializableType
{
    /**
     * @var (
     *    'spki-pem'
     *   |'_unknown'
     * ) $format
     */
    public readonly string $format;

    /**
     * @var (
     *    SpkiPemPublicKeyConfig
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   format: (
     *    'spki-pem'
     *   |'_unknown'
     * ),
     *   value: (
     *    SpkiPemPublicKeyConfig
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->format = $values['format'];
        $this->value = $values['value'];
    }

    /**
     * @param SpkiPemPublicKeyConfig $spkiPem
     * @return PublicKeyEncryptionPlanPublicKey
     */
    public static function spkiPem(SpkiPemPublicKeyConfig $spkiPem): PublicKeyEncryptionPlanPublicKey
    {
        return new PublicKeyEncryptionPlanPublicKey([
            'format' => 'spki-pem',
            'value' => $spkiPem,
        ]);
    }

    /**
     * @return bool
     */
    public function isSpkiPem(): bool
    {
        return $this->value instanceof SpkiPemPublicKeyConfig && $this->format === 'spki-pem';
    }

    /**
     * @return SpkiPemPublicKeyConfig
     */
    public function asSpkiPem(): SpkiPemPublicKeyConfig
    {
        if (!($this->value instanceof SpkiPemPublicKeyConfig && $this->format === 'spki-pem')) {
            throw new Exception(
                "Expected spki-pem; got " . $this->format . " with value of type " . get_debug_type($this->value),
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
        $result['format'] = $this->format;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->format) {
            case 'spki-pem':
                $value = $this->asSpkiPem()->jsonSerialize();
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
        if (!array_key_exists('format', $data)) {
            throw new Exception(
                "JSON data is missing property 'format'",
            );
        }
        $format = $data['format'];
        if (!(is_string($format))) {
            throw new Exception(
                "Expected property 'format' in JSON data to be string, instead received " . get_debug_type($data['format']),
            );
        }

        $args['format'] = $format;
        switch ($format) {
            case 'spki-pem':
                $args['value'] = SpkiPemPublicKeyConfig::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['format'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
