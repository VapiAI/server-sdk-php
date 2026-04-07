<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Exception;
use Vapi\Core\Json\JsonDecoder;

/**
 * These are the options for the transfer assistant's voice.
 */
class TransferAssistantVoice extends JsonSerializableType
{
    /**
     * @var (
     *    'azure'
     *   |'cartesia'
     *   |'custom-voice'
     *   |'deepgram'
     *   |'11labs'
     *   |'hume'
     *   |'lmnt'
     *   |'neuphonic'
     *   |'openai'
     *   |'playht'
     *   |'wellsaid'
     *   |'rime-ai'
     *   |'smallest-ai'
     *   |'tavus'
     *   |'vapi'
     *   |'sesame'
     *   |'inworld'
     *   |'minimax'
     *   |'_unknown'
     * ) $provider
     */
    public readonly string $provider;

    /**
     * @var (
     *    AzureVoice
     *   |CartesiaVoice
     *   |CustomVoice
     *   |DeepgramVoice
     *   |ElevenLabsVoice
     *   |HumeVoice
     *   |LmntVoice
     *   |NeuphonicVoice
     *   |OpenAiVoice
     *   |PlayHtVoice
     *   |WellSaidVoice
     *   |RimeAiVoice
     *   |SmallestAiVoice
     *   |TavusVoice
     *   |VapiVoice
     *   |SesameVoice
     *   |InworldVoice
     *   |MinimaxVoice
     *   |mixed
     * ) $value
     */
    public readonly mixed $value;

    /**
     * @param array{
     *   provider: (
     *    'azure'
     *   |'cartesia'
     *   |'custom-voice'
     *   |'deepgram'
     *   |'11labs'
     *   |'hume'
     *   |'lmnt'
     *   |'neuphonic'
     *   |'openai'
     *   |'playht'
     *   |'wellsaid'
     *   |'rime-ai'
     *   |'smallest-ai'
     *   |'tavus'
     *   |'vapi'
     *   |'sesame'
     *   |'inworld'
     *   |'minimax'
     *   |'_unknown'
     * ),
     *   value: (
     *    AzureVoice
     *   |CartesiaVoice
     *   |CustomVoice
     *   |DeepgramVoice
     *   |ElevenLabsVoice
     *   |HumeVoice
     *   |LmntVoice
     *   |NeuphonicVoice
     *   |OpenAiVoice
     *   |PlayHtVoice
     *   |WellSaidVoice
     *   |RimeAiVoice
     *   |SmallestAiVoice
     *   |TavusVoice
     *   |VapiVoice
     *   |SesameVoice
     *   |InworldVoice
     *   |MinimaxVoice
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
     * @param AzureVoice $azure
     * @return TransferAssistantVoice
     */
    public static function azure(AzureVoice $azure): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'azure',
            'value' => $azure,
        ]);
    }

    /**
     * @param CartesiaVoice $cartesia
     * @return TransferAssistantVoice
     */
    public static function cartesia(CartesiaVoice $cartesia): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'cartesia',
            'value' => $cartesia,
        ]);
    }

    /**
     * @param CustomVoice $customVoice
     * @return TransferAssistantVoice
     */
    public static function customVoice(CustomVoice $customVoice): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'custom-voice',
            'value' => $customVoice,
        ]);
    }

    /**
     * @param DeepgramVoice $deepgram
     * @return TransferAssistantVoice
     */
    public static function deepgram(DeepgramVoice $deepgram): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'deepgram',
            'value' => $deepgram,
        ]);
    }

    /**
     * @param ElevenLabsVoice $_11Labs
     * @return TransferAssistantVoice
     */
    public static function _11Labs(ElevenLabsVoice $_11Labs): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => '11labs',
            'value' => $_11Labs,
        ]);
    }

    /**
     * @param HumeVoice $hume
     * @return TransferAssistantVoice
     */
    public static function hume(HumeVoice $hume): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'hume',
            'value' => $hume,
        ]);
    }

    /**
     * @param LmntVoice $lmnt
     * @return TransferAssistantVoice
     */
    public static function lmnt(LmntVoice $lmnt): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'lmnt',
            'value' => $lmnt,
        ]);
    }

    /**
     * @param NeuphonicVoice $neuphonic
     * @return TransferAssistantVoice
     */
    public static function neuphonic(NeuphonicVoice $neuphonic): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'neuphonic',
            'value' => $neuphonic,
        ]);
    }

    /**
     * @param OpenAiVoice $openai
     * @return TransferAssistantVoice
     */
    public static function openai(OpenAiVoice $openai): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'openai',
            'value' => $openai,
        ]);
    }

    /**
     * @param PlayHtVoice $playht
     * @return TransferAssistantVoice
     */
    public static function playht(PlayHtVoice $playht): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'playht',
            'value' => $playht,
        ]);
    }

    /**
     * @param WellSaidVoice $wellsaid
     * @return TransferAssistantVoice
     */
    public static function wellsaid(WellSaidVoice $wellsaid): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'wellsaid',
            'value' => $wellsaid,
        ]);
    }

    /**
     * @param RimeAiVoice $rimeAi
     * @return TransferAssistantVoice
     */
    public static function rimeAi(RimeAiVoice $rimeAi): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'rime-ai',
            'value' => $rimeAi,
        ]);
    }

    /**
     * @param SmallestAiVoice $smallestAi
     * @return TransferAssistantVoice
     */
    public static function smallestAi(SmallestAiVoice $smallestAi): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'smallest-ai',
            'value' => $smallestAi,
        ]);
    }

    /**
     * @param TavusVoice $tavus
     * @return TransferAssistantVoice
     */
    public static function tavus(TavusVoice $tavus): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'tavus',
            'value' => $tavus,
        ]);
    }

    /**
     * @param VapiVoice $vapi
     * @return TransferAssistantVoice
     */
    public static function vapi(VapiVoice $vapi): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'vapi',
            'value' => $vapi,
        ]);
    }

    /**
     * @param SesameVoice $sesame
     * @return TransferAssistantVoice
     */
    public static function sesame(SesameVoice $sesame): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'sesame',
            'value' => $sesame,
        ]);
    }

    /**
     * @param InworldVoice $inworld
     * @return TransferAssistantVoice
     */
    public static function inworld(InworldVoice $inworld): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'inworld',
            'value' => $inworld,
        ]);
    }

    /**
     * @param MinimaxVoice $minimax
     * @return TransferAssistantVoice
     */
    public static function minimax(MinimaxVoice $minimax): TransferAssistantVoice
    {
        return new TransferAssistantVoice([
            'provider' => 'minimax',
            'value' => $minimax,
        ]);
    }

    /**
     * @return bool
     */
    public function isAzure(): bool
    {
        return $this->value instanceof AzureVoice && $this->provider === 'azure';
    }

    /**
     * @return AzureVoice
     */
    public function asAzure(): AzureVoice
    {
        if (!($this->value instanceof AzureVoice && $this->provider === 'azure')) {
            throw new Exception(
                "Expected azure; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCartesia(): bool
    {
        return $this->value instanceof CartesiaVoice && $this->provider === 'cartesia';
    }

    /**
     * @return CartesiaVoice
     */
    public function asCartesia(): CartesiaVoice
    {
        if (!($this->value instanceof CartesiaVoice && $this->provider === 'cartesia')) {
            throw new Exception(
                "Expected cartesia; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isCustomVoice(): bool
    {
        return $this->value instanceof CustomVoice && $this->provider === 'custom-voice';
    }

    /**
     * @return CustomVoice
     */
    public function asCustomVoice(): CustomVoice
    {
        if (!($this->value instanceof CustomVoice && $this->provider === 'custom-voice')) {
            throw new Exception(
                "Expected custom-voice; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isDeepgram(): bool
    {
        return $this->value instanceof DeepgramVoice && $this->provider === 'deepgram';
    }

    /**
     * @return DeepgramVoice
     */
    public function asDeepgram(): DeepgramVoice
    {
        if (!($this->value instanceof DeepgramVoice && $this->provider === 'deepgram')) {
            throw new Exception(
                "Expected deepgram; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function is_11Labs(): bool
    {
        return $this->value instanceof ElevenLabsVoice && $this->provider === '11labs';
    }

    /**
     * @return ElevenLabsVoice
     */
    public function as_11Labs(): ElevenLabsVoice
    {
        if (!($this->value instanceof ElevenLabsVoice && $this->provider === '11labs')) {
            throw new Exception(
                "Expected 11labs; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isHume(): bool
    {
        return $this->value instanceof HumeVoice && $this->provider === 'hume';
    }

    /**
     * @return HumeVoice
     */
    public function asHume(): HumeVoice
    {
        if (!($this->value instanceof HumeVoice && $this->provider === 'hume')) {
            throw new Exception(
                "Expected hume; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isLmnt(): bool
    {
        return $this->value instanceof LmntVoice && $this->provider === 'lmnt';
    }

    /**
     * @return LmntVoice
     */
    public function asLmnt(): LmntVoice
    {
        if (!($this->value instanceof LmntVoice && $this->provider === 'lmnt')) {
            throw new Exception(
                "Expected lmnt; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isNeuphonic(): bool
    {
        return $this->value instanceof NeuphonicVoice && $this->provider === 'neuphonic';
    }

    /**
     * @return NeuphonicVoice
     */
    public function asNeuphonic(): NeuphonicVoice
    {
        if (!($this->value instanceof NeuphonicVoice && $this->provider === 'neuphonic')) {
            throw new Exception(
                "Expected neuphonic; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isOpenai(): bool
    {
        return $this->value instanceof OpenAiVoice && $this->provider === 'openai';
    }

    /**
     * @return OpenAiVoice
     */
    public function asOpenai(): OpenAiVoice
    {
        if (!($this->value instanceof OpenAiVoice && $this->provider === 'openai')) {
            throw new Exception(
                "Expected openai; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPlayht(): bool
    {
        return $this->value instanceof PlayHtVoice && $this->provider === 'playht';
    }

    /**
     * @return PlayHtVoice
     */
    public function asPlayht(): PlayHtVoice
    {
        if (!($this->value instanceof PlayHtVoice && $this->provider === 'playht')) {
            throw new Exception(
                "Expected playht; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isWellsaid(): bool
    {
        return $this->value instanceof WellSaidVoice && $this->provider === 'wellsaid';
    }

    /**
     * @return WellSaidVoice
     */
    public function asWellsaid(): WellSaidVoice
    {
        if (!($this->value instanceof WellSaidVoice && $this->provider === 'wellsaid')) {
            throw new Exception(
                "Expected wellsaid; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isRimeAi(): bool
    {
        return $this->value instanceof RimeAiVoice && $this->provider === 'rime-ai';
    }

    /**
     * @return RimeAiVoice
     */
    public function asRimeAi(): RimeAiVoice
    {
        if (!($this->value instanceof RimeAiVoice && $this->provider === 'rime-ai')) {
            throw new Exception(
                "Expected rime-ai; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSmallestAi(): bool
    {
        return $this->value instanceof SmallestAiVoice && $this->provider === 'smallest-ai';
    }

    /**
     * @return SmallestAiVoice
     */
    public function asSmallestAi(): SmallestAiVoice
    {
        if (!($this->value instanceof SmallestAiVoice && $this->provider === 'smallest-ai')) {
            throw new Exception(
                "Expected smallest-ai; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isTavus(): bool
    {
        return $this->value instanceof TavusVoice && $this->provider === 'tavus';
    }

    /**
     * @return TavusVoice
     */
    public function asTavus(): TavusVoice
    {
        if (!($this->value instanceof TavusVoice && $this->provider === 'tavus')) {
            throw new Exception(
                "Expected tavus; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isVapi(): bool
    {
        return $this->value instanceof VapiVoice && $this->provider === 'vapi';
    }

    /**
     * @return VapiVoice
     */
    public function asVapi(): VapiVoice
    {
        if (!($this->value instanceof VapiVoice && $this->provider === 'vapi')) {
            throw new Exception(
                "Expected vapi; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isSesame(): bool
    {
        return $this->value instanceof SesameVoice && $this->provider === 'sesame';
    }

    /**
     * @return SesameVoice
     */
    public function asSesame(): SesameVoice
    {
        if (!($this->value instanceof SesameVoice && $this->provider === 'sesame')) {
            throw new Exception(
                "Expected sesame; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isInworld(): bool
    {
        return $this->value instanceof InworldVoice && $this->provider === 'inworld';
    }

    /**
     * @return InworldVoice
     */
    public function asInworld(): InworldVoice
    {
        if (!($this->value instanceof InworldVoice && $this->provider === 'inworld')) {
            throw new Exception(
                "Expected inworld; got " . $this->provider . " with value of type " . get_debug_type($this->value),
            );
        }

        return $this->value;
    }

    /**
     * @return bool
     */
    public function isMinimax(): bool
    {
        return $this->value instanceof MinimaxVoice && $this->provider === 'minimax';
    }

    /**
     * @return MinimaxVoice
     */
    public function asMinimax(): MinimaxVoice
    {
        if (!($this->value instanceof MinimaxVoice && $this->provider === 'minimax')) {
            throw new Exception(
                "Expected minimax; got " . $this->provider . " with value of type " . get_debug_type($this->value),
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
            case 'azure':
                $value = $this->asAzure()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'cartesia':
                $value = $this->asCartesia()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'custom-voice':
                $value = $this->asCustomVoice()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'deepgram':
                $value = $this->asDeepgram()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case '11labs':
                $value = $this->as_11Labs()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'hume':
                $value = $this->asHume()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'lmnt':
                $value = $this->asLmnt()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'neuphonic':
                $value = $this->asNeuphonic()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'openai':
                $value = $this->asOpenai()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'playht':
                $value = $this->asPlayht()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'wellsaid':
                $value = $this->asWellsaid()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'rime-ai':
                $value = $this->asRimeAi()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'smallest-ai':
                $value = $this->asSmallestAi()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'tavus':
                $value = $this->asTavus()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'vapi':
                $value = $this->asVapi()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'sesame':
                $value = $this->asSesame()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'inworld':
                $value = $this->asInworld()->jsonSerialize();
                $result = array_merge($value, $result);
                break;
            case 'minimax':
                $value = $this->asMinimax()->jsonSerialize();
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
            case 'azure':
                $args['value'] = AzureVoice::jsonDeserialize($data);
                break;
            case 'cartesia':
                $args['value'] = CartesiaVoice::jsonDeserialize($data);
                break;
            case 'custom-voice':
                $args['value'] = CustomVoice::jsonDeserialize($data);
                break;
            case 'deepgram':
                $args['value'] = DeepgramVoice::jsonDeserialize($data);
                break;
            case '11labs':
                $args['value'] = ElevenLabsVoice::jsonDeserialize($data);
                break;
            case 'hume':
                $args['value'] = HumeVoice::jsonDeserialize($data);
                break;
            case 'lmnt':
                $args['value'] = LmntVoice::jsonDeserialize($data);
                break;
            case 'neuphonic':
                $args['value'] = NeuphonicVoice::jsonDeserialize($data);
                break;
            case 'openai':
                $args['value'] = OpenAiVoice::jsonDeserialize($data);
                break;
            case 'playht':
                $args['value'] = PlayHtVoice::jsonDeserialize($data);
                break;
            case 'wellsaid':
                $args['value'] = WellSaidVoice::jsonDeserialize($data);
                break;
            case 'rime-ai':
                $args['value'] = RimeAiVoice::jsonDeserialize($data);
                break;
            case 'smallest-ai':
                $args['value'] = SmallestAiVoice::jsonDeserialize($data);
                break;
            case 'tavus':
                $args['value'] = TavusVoice::jsonDeserialize($data);
                break;
            case 'vapi':
                $args['value'] = VapiVoice::jsonDeserialize($data);
                break;
            case 'sesame':
                $args['value'] = SesameVoice::jsonDeserialize($data);
                break;
            case 'inworld':
                $args['value'] = InworldVoice::jsonDeserialize($data);
                break;
            case 'minimax':
                $args['value'] = MinimaxVoice::jsonDeserialize($data);
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
