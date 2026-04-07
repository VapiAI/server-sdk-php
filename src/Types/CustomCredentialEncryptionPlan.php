<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

/**
 * This is the encryption plan for encrypting sensitive data. Currently supports public-key encryption.
 */
class CustomCredentialEncryptionPlan extends JsonSerializableType
{
    /**
     * @var (
     *    'public-key'
     *   |'_unknown'
     * ) $type
     */
    public readonly string $type;

    /**
     * @var (
     *    PublicKeyEncryptionPlan
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'public-key'
     *   |'_unknown'
     * ),
     *   value: (
     *    PublicKeyEncryptionPlan
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->value = $values['value'];
    }

    /**
     * @param PublicKeyEncryptionPlan $publicKey
     * @return CustomCredentialEncryptionPlan
     */
    public static function publicKey(PublicKeyEncryptionPlan $publicKey): CustomCredentialEncryptionPlan
    {
        return new CustomCredentialEncryptionPlan([
            'type' => 'public-key',
            'value' => $publicKey,
        ]);
    }

    /**
     * @return bool
     */
    public function isPublicKey(): bool
    {
        return $this->value instanceof PublicKeyEncryptionPlan && $this->type === 'public-key';
    }

    /**
     * @return PublicKeyEncryptionPlan
     */
    public function asPublicKey(): PublicKeyEncryptionPlan
    {
        if (!($this->value instanceof PublicKeyEncryptionPlan && $this->type === 'public-key')) {
            throw new Exception(
                "Expected public-key; got " . $this->type . " with value of type " . get_debug_type($this->value),
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
        $result['type'] = $this->type;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->type) {
            case 'public-key':
                $value = $this->asPublicKey()->jsonSerialize();
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
        if (!array_key_exists('type', $data)) {
            throw new Exception(
                "JSON data is missing property 'type'",
            );
        }
        $type = $data['type'];
        if (!(is_string($type))) {
            throw new Exception(
                "Expected property 'type' in JSON data to be string, instead received " . get_debug_type($data['type']),
            );
        }

        $args['type'] = $type;
        switch ($type) {
            case 'public-key':
                $args['value'] = PublicKeyEncryptionPlan::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['type'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
