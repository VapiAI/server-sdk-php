<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardIssueDefinitionDto extends JsonSerializableType
{
    /**
     * @var ?string $applicability
     */
    #[JsonProperty('applicability')]
    public ?string $applicability;

    /**
     * @var ?string $problem
     */
    #[JsonProperty('problem')]
    public ?string $problem;

    /**
     * @var ?int $createdTaxonomyVersion
     */
    #[JsonProperty('createdTaxonomyVersion')]
    public ?int $createdTaxonomyVersion;

    /**
     * @param array{
     *   applicability?: ?string,
     *   problem?: ?string,
     *   createdTaxonomyVersion?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->applicability = $values['applicability'] ?? null;
        $this->problem = $values['problem'] ?? null;
        $this->createdTaxonomyVersion = $values['createdTaxonomyVersion'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
