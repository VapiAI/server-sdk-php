<?php

namespace Vapi\Insight\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Types\InsightRunFormatPlan;
use Vapi\Core\Json\JsonProperty;
use Vapi\Types\InsightTimeRangeWithStep;

class InsightRunDto extends JsonSerializableType
{
    /**
     * @var ?InsightRunFormatPlan $formatPlan Output-formatting instructions applied to the insight run.
     */
    #[JsonProperty('formatPlan')]
    public ?InsightRunFormatPlan $formatPlan;

    /**
     * This is the optional time range override for the insight.
     * If provided, overrides every field in the insight's timeRange.
     * If this is provided with missing fields, defaults will be used, not the insight's timeRange.
     * start default - "-7d"
     * end default - "now"
     * step default - "day"
     * For Pie and Text Insights, step will be ignored even if provided.
     *
     * @var ?InsightTimeRangeWithStep $timeRangeOverride
     */
    #[JsonProperty('timeRangeOverride')]
    public ?InsightTimeRangeWithStep $timeRangeOverride;

    /**
     * Optional runtime assistant scope for dashboards.
     * This is applied to call-table queries without mutating the saved insight.
     *
     * @var ?string $assistantId
     */
    #[JsonProperty('assistantId')]
    public ?string $assistantId;

    /**
     * @param array{
     *   formatPlan?: ?InsightRunFormatPlan,
     *   timeRangeOverride?: ?InsightTimeRangeWithStep,
     *   assistantId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->formatPlan = $values['formatPlan'] ?? null;
        $this->timeRangeOverride = $values['timeRangeOverride'] ?? null;
        $this->assistantId = $values['assistantId'] ?? null;
    }
}
