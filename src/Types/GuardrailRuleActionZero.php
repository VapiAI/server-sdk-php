<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class GuardrailRuleActionZero extends JsonSerializableType
{
    /**
     * @var (
     *    'fixed'
     *   |'redirect'
     *   |'_unknown'
     * ) $mode
     */
    public readonly string $mode;

    /**
     * @var (
     *    GuardrailFixedResponseAction
     *   |GuardrailRedirectAction
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   mode: (
     *    'fixed'
     *   |'redirect'
     *   |'_unknown'
     * ),
     *   value: (
     *    GuardrailFixedResponseAction
     *   |GuardrailRedirectAction
     *   |mixed
     * ),
     * } $values
     */
    private function __construct(
        array $values,
    ) {
        $this->mode = $values['mode'];
        $this->value = $values['value'];
    }

    /**
     * @param GuardrailFixedResponseAction $fixed
     * @return GuardrailRuleActionZero
     */
    public static function fixed(GuardrailFixedResponseAction $fixed): GuardrailRuleActionZero
    {
        return new GuardrailRuleActionZero([
            'mode' => 'fixed',
            'value' => $fixed,
        ]);
    }

    /**
     * @param GuardrailRedirectAction $redirect
     * @return GuardrailRuleActionZero
     */
    public static function redirect(GuardrailRedirectAction $redirect): GuardrailRuleActionZero
    {
        return new GuardrailRuleActionZero([
            'mode' => 'redirect',
            'value' => $redirect,
        ]);
    }

    /**
     * @return bool
     */
    public function isFixed(): bool
    {
        return $this->value instanceof GuardrailFixedResponseAction && $this->mode === 'fixed';
    }

    /**
     * @return GuardrailFixedResponseAction
     */
    public function asFixed(): GuardrailFixedResponseAction
    {
        if (!($this->value instanceof GuardrailFixedResponseAction && $this->mode === 'fixed')) {
            throw new Exception(
                "Expected fixed; got " . $this->mode . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isRedirect(): bool
    {
        return $this->value instanceof GuardrailRedirectAction && $this->mode === 'redirect';
    }

    /**
     * @return GuardrailRedirectAction
     */
    public function asRedirect(): GuardrailRedirectAction
    {
        if (!($this->value instanceof GuardrailRedirectAction && $this->mode === 'redirect')) {
            throw new Exception(
                "Expected redirect; got " . $this->mode . " with value of type " . get_debug_type($this->value),
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
        $result['mode'] = $this->mode;

        $base = parent::jsonSerialize();
        $result = array_merge($base, $result);

        switch ($this->mode) {
            case 'fixed':
                $value = $this->asFixed()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'redirect':
                $value = $this->asRedirect()->jsonSerialize();
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
        if (!array_key_exists('mode', $data)) {
            throw new Exception(
                "JSON data is missing property 'mode'",
            );
        }
        $mode = $data['mode'];
        if (!(is_string($mode))) {
            throw new Exception(
                "Expected property 'mode' in JSON data to be string, instead received " . get_debug_type($data['mode']),
            );
        }

        $args['mode'] = $mode;
        switch ($mode) {
            case 'fixed':
                $args['value'] = GuardrailFixedResponseAction::jsonDeserialize($data);
                break;
            case 'redirect':
                $args['value'] = GuardrailRedirectAction::jsonDeserialize($data);
                break;
            case '_unknown':
            default:
                $args['mode'] = '_unknown';
                $args['value'] = $data;
        }

        // @phpstan-ignore-next-line
        return new static($args);
    }
}
