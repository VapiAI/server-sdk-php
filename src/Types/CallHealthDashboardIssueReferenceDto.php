<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardIssueReferenceDto extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    public string $name;

    /**
     * @var value-of<CallHealthDashboardIssueReferenceDtoStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $rowVersion
     */
    #[JsonProperty('rowVersion')]
    public int $rowVersion;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   status: value-of<CallHealthDashboardIssueReferenceDtoStatus>,
     *   rowVersion: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->status = $values['status'];
        $this->rowVersion = $values['rowVersion'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
