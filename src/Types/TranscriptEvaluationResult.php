<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;
use Vapi\Core\Types\ArrayType;

class TranscriptEvaluationResult extends JsonSerializableType
{
    /**
     * This is the word error rate: (substitutions + deletions + insertions)
     * divided by the answer key's word count. Null when the answer key has no
     * words.
     *
     * @var ?float $wer
     */
    #[JsonProperty('wer')]
    public ?float $wer;

    /**
     * @var float $hits This is the number of answer-key words transcribed correctly.
     */
    #[JsonProperty('hits')]
    public float $hits;

    /**
     * @var float $substitutions This is the number of answer-key words transcribed as a different word.
     */
    #[JsonProperty('substitutions')]
    public float $substitutions;

    /**
     * @var float $deletions This is the number of answer-key words missing from the transcript.
     */
    #[JsonProperty('deletions')]
    public float $deletions;

    /**
     * @var float $insertions This is the number of transcript words with no answer-key word.
     */
    #[JsonProperty('insertions')]
    public float $insertions;

    /**
     * @var float $referenceWordCount This is the number of words in the normalized answer key.
     */
    #[JsonProperty('referenceWordCount')]
    public float $referenceWordCount;

    /**
     * @var float $hypothesisWordCount This is the number of words in the normalized transcript.
     */
    #[JsonProperty('hypothesisWordCount')]
    public float $hypothesisWordCount;

    /**
     * @var array<TranscriptKeyValueResult> $keyValues This is each key value's verdict, in answer-key order.
     */
    #[JsonProperty('keyValues'), ArrayType([TranscriptKeyValueResult::class])]
    public array $keyValues;

    /**
     * @var array<TranscriptMetricEvaluationResult> $evaluations This is each of the scenario's metric evaluations, in the scenario's order.
     */
    #[JsonProperty('evaluations'), ArrayType([TranscriptMetricEvaluationResult::class])]
    public array $evaluations;

    /**
     * This is false when a required evaluation failed or a required key value
     * did not come through exactly.
     *
     * @var bool $passed
     */
    #[JsonProperty('passed')]
    public bool $passed;

    /**
     * @param array{
     *   hits: float,
     *   substitutions: float,
     *   deletions: float,
     *   insertions: float,
     *   referenceWordCount: float,
     *   hypothesisWordCount: float,
     *   keyValues: array<TranscriptKeyValueResult>,
     *   evaluations: array<TranscriptMetricEvaluationResult>,
     *   passed: bool,
     *   wer?: ?float,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->wer = $values['wer'] ?? null;
        $this->hits = $values['hits'];
        $this->substitutions = $values['substitutions'];
        $this->deletions = $values['deletions'];
        $this->insertions = $values['insertions'];
        $this->referenceWordCount = $values['referenceWordCount'];
        $this->hypothesisWordCount = $values['hypothesisWordCount'];
        $this->keyValues = $values['keyValues'];
        $this->evaluations = $values['evaluations'];
        $this->passed = $values['passed'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
