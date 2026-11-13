<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardSeriesPageDto extends JsonSerializableType
{
    /**
     * @var CallHealthDashboardWindowDto $window Full resolved completion window used by every total, rate and coverage count.
     */
    #[JsonProperty('window')]
    public CallHealthDashboardWindowDto $window;

    /**
     * @var CallHealthDashboardWindowDto $pageWindow Clipped completion window represented by this page's daily buckets.
     */
    #[JsonProperty('pageWindow')]
    public CallHealthDashboardWindowDto $pageWindow;

    /**
     * @var ?string $nextCursor Continue chart dates only; independent of the issue-row nextCursor.
     */
    #[JsonProperty('nextCursor')]
    public ?string $nextCursor;

    /**
     * @param array{
     *   window: CallHealthDashboardWindowDto,
     *   pageWindow: CallHealthDashboardWindowDto,
     *   nextCursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->window = $values['window'];
        $this->pageWindow = $values['pageWindow'];
        $this->nextCursor = $values['nextCursor'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
