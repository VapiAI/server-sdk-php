<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

/**
 * Authentication method - either direct IAM credentials or cross-account role assumption.
 */
class UpdateAnthropicBedrockCredentialDtoAuthenticationPlan extends JsonSerializableType
{
    /**
     * @var (
     *    'aws-iam'
     *   |'aws-sts'
     *   |'_unknown'
     * ) $type
     */
    public readonly string $type;

    /**
     * @var (
     *    AwsiamCredentialsAuthenticationPlan
     *   |AwsStsAuthenticationPlan
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'aws-iam'
     *   |'aws-sts'
     *   |'_unknown'
     * ),
     *   value: (
     *    AwsiamCredentialsAuthenticationPlan
     *   |AwsStsAuthenticationPlan
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
     * @param AwsiamCredentialsAuthenticationPlan $awsIam
     * @return UpdateAnthropicBedrockCredentialDtoAuthenticationPlan
     */
    public static function awsIam(AwsiamCredentialsAuthenticationPlan $awsIam): UpdateAnthropicBedrockCredentialDtoAuthenticationPlan
    {
        return new UpdateAnthropicBedrockCredentialDtoAuthenticationPlan([
            'type' => 'aws-iam',
            'value' => $awsIam,
        ]);
    }

    /**
     * @param AwsStsAuthenticationPlan $awsSts
     * @return UpdateAnthropicBedrockCredentialDtoAuthenticationPlan
     */
    public static function awsSts(AwsStsAuthenticationPlan $awsSts): UpdateAnthropicBedrockCredentialDtoAuthenticationPlan
    {
        return new UpdateAnthropicBedrockCredentialDtoAuthenticationPlan([
            'type' => 'aws-sts',
            'value' => $awsSts,
        ]);
    }

    /**
     * @return bool
     */
    public function isAwsIam(): bool
    {
        return $this->value instanceof AwsiamCredentialsAuthenticationPlan && $this->type === 'aws-iam';
    }

    /**
     * @return AwsiamCredentialsAuthenticationPlan
     */
    public function asAwsIam(): AwsiamCredentialsAuthenticationPlan
    {
        if (!($this->value instanceof AwsiamCredentialsAuthenticationPlan && $this->type === 'aws-iam')) {
            throw new Exception(
                "Expected aws-iam; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isAwsSts(): bool
    {
        return $this->value instanceof AwsStsAuthenticationPlan && $this->type === 'aws-sts';
    }

    /**
     * @return AwsStsAuthenticationPlan
     */
    public function asAwsSts(): AwsStsAuthenticationPlan
    {
        if (!($this->value instanceof AwsStsAuthenticationPlan && $this->type === 'aws-sts')) {
            throw new Exception(
                "Expected aws-sts; got " . $this->type . " with value of type " . get_debug_type($this->value),
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
            case 'aws-iam':
                $value = $this->asAwsIam()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'aws-sts':
                $value = $this->asAwsSts()->jsonSerialize();
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
            case 'aws-iam':
                $args['value'] = AwsiamCredentialsAuthenticationPlan::jsonDeserialize($data);
                break;
            case 'aws-sts':
                $args['value'] = AwsStsAuthenticationPlan::jsonDeserialize($data);
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
