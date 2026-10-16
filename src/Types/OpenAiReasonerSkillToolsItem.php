<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

class OpenAiReasonerSkillToolsItem extends JsonSerializableType
{
    /**
     * @var (
     *    'function'
     *   |'apiRequest'
     *   |'mcp'
     *   |'endCall'
     *   |'dtmf'
     *   |'transferCall'
     *   |'_unknown'
     * ) $type
     */
    public readonly string $type;

    /**
     * @var (
     *    CreateFunctionToolDto
     *   |CreateApiRequestToolDto
     *   |CreateMcpToolDto
     *   |CreateEndCallToolDto
     *   |CreateDtmfToolDto
     *   |CreateTransferCallToolDto
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   type: (
     *    'function'
     *   |'apiRequest'
     *   |'mcp'
     *   |'endCall'
     *   |'dtmf'
     *   |'transferCall'
     *   |'_unknown'
     * ),
     *   value: (
     *    CreateFunctionToolDto
     *   |CreateApiRequestToolDto
     *   |CreateMcpToolDto
     *   |CreateEndCallToolDto
     *   |CreateDtmfToolDto
     *   |CreateTransferCallToolDto
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
     * @param CreateFunctionToolDto $function
     * @return OpenAiReasonerSkillToolsItem
     */
    public static function function(CreateFunctionToolDto $function): OpenAiReasonerSkillToolsItem
    {
        return new OpenAiReasonerSkillToolsItem([
            'type' => 'function',
            'value' => $function,
        ]);
    }

    /**
     * @param CreateApiRequestToolDto $apiRequest
     * @return OpenAiReasonerSkillToolsItem
     */
    public static function apiRequest(CreateApiRequestToolDto $apiRequest): OpenAiReasonerSkillToolsItem
    {
        return new OpenAiReasonerSkillToolsItem([
            'type' => 'apiRequest',
            'value' => $apiRequest,
        ]);
    }

    /**
     * @param CreateMcpToolDto $mcp
     * @return OpenAiReasonerSkillToolsItem
     */
    public static function mcp(CreateMcpToolDto $mcp): OpenAiReasonerSkillToolsItem
    {
        return new OpenAiReasonerSkillToolsItem([
            'type' => 'mcp',
            'value' => $mcp,
        ]);
    }

    /**
     * @param CreateEndCallToolDto $endCall
     * @return OpenAiReasonerSkillToolsItem
     */
    public static function endCall(CreateEndCallToolDto $endCall): OpenAiReasonerSkillToolsItem
    {
        return new OpenAiReasonerSkillToolsItem([
            'type' => 'endCall',
            'value' => $endCall,
        ]);
    }

    /**
     * @param CreateDtmfToolDto $dtmf
     * @return OpenAiReasonerSkillToolsItem
     */
    public static function dtmf(CreateDtmfToolDto $dtmf): OpenAiReasonerSkillToolsItem
    {
        return new OpenAiReasonerSkillToolsItem([
            'type' => 'dtmf',
            'value' => $dtmf,
        ]);
    }

    /**
     * @param CreateTransferCallToolDto $transferCall
     * @return OpenAiReasonerSkillToolsItem
     */
    public static function transferCall(CreateTransferCallToolDto $transferCall): OpenAiReasonerSkillToolsItem
    {
        return new OpenAiReasonerSkillToolsItem([
            'type' => 'transferCall',
            'value' => $transferCall,
        ]);
    }

    /**
     * @return bool
     */
    public function isFunction_(): bool
    {
        return $this->value instanceof CreateFunctionToolDto && $this->type === 'function';
    }

    /**
     * @return CreateFunctionToolDto
     */
    public function asFunction_(): CreateFunctionToolDto
    {
        if (!($this->value instanceof CreateFunctionToolDto && $this->type === 'function')) {
            throw new Exception(
                "Expected function; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isApiRequest(): bool
    {
        return $this->value instanceof CreateApiRequestToolDto && $this->type === 'apiRequest';
    }

    /**
     * @return CreateApiRequestToolDto
     */
    public function asApiRequest(): CreateApiRequestToolDto
    {
        if (!($this->value instanceof CreateApiRequestToolDto && $this->type === 'apiRequest')) {
            throw new Exception(
                "Expected apiRequest; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isMcp(): bool
    {
        return $this->value instanceof CreateMcpToolDto && $this->type === 'mcp';
    }

    /**
     * @return CreateMcpToolDto
     */
    public function asMcp(): CreateMcpToolDto
    {
        if (!($this->value instanceof CreateMcpToolDto && $this->type === 'mcp')) {
            throw new Exception(
                "Expected mcp; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isEndCall(): bool
    {
        return $this->value instanceof CreateEndCallToolDto && $this->type === 'endCall';
    }

    /**
     * @return CreateEndCallToolDto
     */
    public function asEndCall(): CreateEndCallToolDto
    {
        if (!($this->value instanceof CreateEndCallToolDto && $this->type === 'endCall')) {
            throw new Exception(
                "Expected endCall; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDtmf(): bool
    {
        return $this->value instanceof CreateDtmfToolDto && $this->type === 'dtmf';
    }

    /**
     * @return CreateDtmfToolDto
     */
    public function asDtmf(): CreateDtmfToolDto
    {
        if (!($this->value instanceof CreateDtmfToolDto && $this->type === 'dtmf')) {
            throw new Exception(
                "Expected dtmf; got " . $this->type . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTransferCall(): bool
    {
        return $this->value instanceof CreateTransferCallToolDto && $this->type === 'transferCall';
    }

    /**
     * @return CreateTransferCallToolDto
     */
    public function asTransferCall(): CreateTransferCallToolDto
    {
        if (!($this->value instanceof CreateTransferCallToolDto && $this->type === 'transferCall')) {
            throw new Exception(
                "Expected transferCall; got " . $this->type . " with value of type " . get_debug_type($this->value),
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
            case 'function':
                $value = $this->asFunction_()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'apiRequest':
                $value = $this->asApiRequest()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'mcp':
                $value = $this->asMcp()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'endCall':
                $value = $this->asEndCall()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'dtmf':
                $value = $this->asDtmf()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'transferCall':
                $value = $this->asTransferCall()->jsonSerialize();
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
            case 'function':
                $args['value'] = CreateFunctionToolDto::jsonDeserialize($data);
                break;
            case 'apiRequest':
                $args['value'] = CreateApiRequestToolDto::jsonDeserialize($data);
                break;
            case 'mcp':
                $args['value'] = CreateMcpToolDto::jsonDeserialize($data);
                break;
            case 'endCall':
                $args['value'] = CreateEndCallToolDto::jsonDeserialize($data);
                break;
            case 'dtmf':
                $args['value'] = CreateDtmfToolDto::jsonDeserialize($data);
                break;
            case 'transferCall':
                $args['value'] = CreateTransferCallToolDto::jsonDeserialize($data);
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
