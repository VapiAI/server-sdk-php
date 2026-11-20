<?php

namespace Vapi\Types;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\Core\Json\JsonProperty;

class CallHealthDashboardCallIssueDto extends JsonSerializableType
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
     * @var value-of<CallHealthDashboardCallIssueDtoStatus> $status
     */
    #[JsonProperty('status')]
    public string $status;

    /**
     * @var int $rowVersion
     */
    #[JsonProperty('rowVersion')]
    public int $rowVersion;

    /**
     * @var string $categoryKey The ranking category the issue belongs to.
     */
    #[JsonProperty('categoryKey')]
    public string $categoryKey;

    /**
     * @param array{
     *   id: string,
     *   name: string,
     *   status: value-of<CallHealthDashboardCallIssueDtoStatus>,
     *   rowVersion: int,
     *   categoryKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->name = $values['name'];
        $this->status = $values['status'];
        $this->rowVersion = $values['rowVersion'];
        $this->categoryKey = $values['categoryKey'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
