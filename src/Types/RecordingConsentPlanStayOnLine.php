<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

/**
 * Configuration for requesting recording consent by treating continued presence on the call as consent, including the announcement voice and wait time.
 */
class RecordingConsentPlanStayOnLine extends JsonSerializableType
{
    /**
     * This is the message asking for consent to record the call.
     * If the type is `stay-on-line`, the message should ask the user to hang up if they do not consent.
     * If the type is `verbal`, the message should ask the user to verbally consent or decline.
     *
     * @var string $message
     */
    #[JsonProperty('message')]
    public string $message;

    /**
     * This is the voice to use for the consent message. If not specified, inherits from the assistant's voice.
     * Use a different voice for the consent message for a better user experience.
     *
     * @var ?RecordingConsentPlanStayOnLineVoice $voice
     */
    #[JsonProperty('voice')]
    public ?RecordingConsentPlanStayOnLineVoice $voice;

    /**
     * This controls whether the consent assistant speaks first or waits for the caller to speak first.
     *
     * Use:
     * - `assistant-speaks-first` (default) to have the consent assistant play the consent message as soon as the call is answered.
     * - `assistant-waits-for-user` to have the consent assistant wait for the caller to speak before playing the consent message.
     *
     * We strongly recommend `assistant-waits-for-user` for outbound calls. Some telephony providers signal "answered" while the line is still ringing, which can cause the consent message to play into a ringing line and be missed by the caller. Waiting for the caller to speak first guarantees they hear the full consent message.
     *
     * Note: when combined with `type: 'stay-on-line'`, silence only counts toward consent after the caller has spoken at least once.
     *
     * @default 'assistant-speaks-first'
     *
     * @var ?value-of<RecordingConsentPlanStayOnLineFirstMessageMode> $firstMessageMode
     */
    #[JsonProperty('firstMessageMode')]
    public ?string $firstMessageMode;

    /**
     * @var ?float $waitSeconds Number of seconds to wait before transferring to the assistant if user stays on the call
     */
    #[JsonProperty('waitSeconds')]
    public ?float $waitSeconds;

    /**
     * @param array{
     *   message: string,
     *   voice?: ?RecordingConsentPlanStayOnLineVoice,
     *   firstMessageMode?: ?value-of<RecordingConsentPlanStayOnLineFirstMessageMode>,
     *   waitSeconds?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->message = $values['message'];
        $this->voice = $values['voice'] ?? null;
        $this->firstMessageMode = $values['firstMessageMode'] ?? null;
        $this->waitSeconds = $values['waitSeconds'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
