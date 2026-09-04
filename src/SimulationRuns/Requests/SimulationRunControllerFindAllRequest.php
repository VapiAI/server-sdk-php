<?php

namespace Vapi\SimulationRuns\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\SimulationRuns\Types\SimulationRunControllerFindAllRequestStatus;
use Vapi\SimulationRuns\Types\SimulationRunControllerFindAllRequestFilterStatus;
use Vapi\SimulationRuns\Types\SimulationRunControllerFindAllRequestTargetType;
use Vapi\SimulationRuns\Types\SimulationRunControllerFindAllRequestSortOrder;
use Vapi\SimulationRuns\Types\SimulationRunControllerFindAllRequestSortBy;
use DateTime;

class SimulationRunControllerFindAllRequest extends JsonSerializableType
{
    /**
     * @var ?value-of<SimulationRunControllerFindAllRequestStatus> $status Filter by status
     */
    public ?string $status;

    /**
     * @var ?value-of<SimulationRunControllerFindAllRequestFilterStatus> $filterStatus Filter by aggregate run result status
     */
    public ?string $filterStatus;

    /**
     * @var ?value-of<SimulationRunControllerFindAllRequestTargetType> $targetType Filter by target type
     */
    public ?string $targetType;

    /**
     * @var ?string $targetId Filter by target id
     */
    public ?string $targetId;

    /**
     * @var ?float $page This is the page number to return. Defaults to 1.
     */
    public ?float $page;

    /**
     * @var ?value-of<SimulationRunControllerFindAllRequestSortOrder> $sortOrder This is the sort order for pagination. Defaults to 'DESC'.
     */
    public ?string $sortOrder;

    /**
     * @var ?value-of<SimulationRunControllerFindAllRequestSortBy> $sortBy This is the column to sort by. Defaults to 'createdAt'.
     */
    public ?string $sortBy;

    /**
     * @var ?float $limit This is the maximum number of items to return. Defaults to 100.
     */
    public ?float $limit;

    /**
     * @var ?DateTime $createdAtGt This will return items where the createdAt is greater than the specified value.
     */
    public ?DateTime $createdAtGt;

    /**
     * @var ?DateTime $createdAtLt This will return items where the createdAt is less than the specified value.
     */
    public ?DateTime $createdAtLt;

    /**
     * @var ?DateTime $createdAtGe This will return items where the createdAt is greater than or equal to the specified value.
     */
    public ?DateTime $createdAtGe;

    /**
     * @var ?DateTime $createdAtLe This will return items where the createdAt is less than or equal to the specified value.
     */
    public ?DateTime $createdAtLe;

    /**
     * @var ?DateTime $updatedAtGt This will return items where the updatedAt is greater than the specified value.
     */
    public ?DateTime $updatedAtGt;

    /**
     * @var ?DateTime $updatedAtLt This will return items where the updatedAt is less than the specified value.
     */
    public ?DateTime $updatedAtLt;

    /**
     * @var ?DateTime $updatedAtGe This will return items where the updatedAt is greater than or equal to the specified value.
     */
    public ?DateTime $updatedAtGe;

    /**
     * @var ?DateTime $updatedAtLe This will return items where the updatedAt is less than or equal to the specified value.
     */
    public ?DateTime $updatedAtLe;

    /**
     * @param array{
     *   status?: ?value-of<SimulationRunControllerFindAllRequestStatus>,
     *   filterStatus?: ?value-of<SimulationRunControllerFindAllRequestFilterStatus>,
     *   targetType?: ?value-of<SimulationRunControllerFindAllRequestTargetType>,
     *   targetId?: ?string,
     *   page?: ?float,
     *   sortOrder?: ?value-of<SimulationRunControllerFindAllRequestSortOrder>,
     *   sortBy?: ?value-of<SimulationRunControllerFindAllRequestSortBy>,
     *   limit?: ?float,
     *   createdAtGt?: ?DateTime,
     *   createdAtLt?: ?DateTime,
     *   createdAtGe?: ?DateTime,
     *   createdAtLe?: ?DateTime,
     *   updatedAtGt?: ?DateTime,
     *   updatedAtLt?: ?DateTime,
     *   updatedAtGe?: ?DateTime,
     *   updatedAtLe?: ?DateTime,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->filterStatus = $values['filterStatus'] ?? null;
        $this->targetType = $values['targetType'] ?? null;
        $this->targetId = $values['targetId'] ?? null;
        $this->page = $values['page'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->sortBy = $values['sortBy'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->createdAtGt = $values['createdAtGt'] ?? null;
        $this->createdAtLt = $values['createdAtLt'] ?? null;
        $this->createdAtGe = $values['createdAtGe'] ?? null;
        $this->createdAtLe = $values['createdAtLe'] ?? null;
        $this->updatedAtGt = $values['updatedAtGt'] ?? null;
        $this->updatedAtLt = $values['updatedAtLt'] ?? null;
        $this->updatedAtGe = $values['updatedAtGe'] ?? null;
        $this->updatedAtLe = $values['updatedAtLe'] ?? null;
    }
}
