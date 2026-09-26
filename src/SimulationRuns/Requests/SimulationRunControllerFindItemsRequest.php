<?php

namespace Vapi\SimulationRuns\Requests;

use Vapi\Core\Json\JsonSerializableType;
use Vapi\SimulationRuns\Types\SimulationRunControllerFindItemsRequestStatus;
use Vapi\SimulationRuns\Types\SimulationRunControllerFindItemsRequestSortOrder;
use Vapi\SimulationRuns\Types\SimulationRunControllerFindItemsRequestSortBy;
use DateTime;

class SimulationRunControllerFindItemsRequest extends JsonSerializableType
{
    /**
     * @var ?string $simulationId Filters run items to a specific simulation.
     */
    public ?string $simulationId;

    /**
     * @var ?string $runId Filters run items to a specific run.
     */
    public ?string $runId;

    /**
     * @var ?value-of<SimulationRunControllerFindItemsRequestStatus> $status Filters run items by status.
     */
    public ?string $status;

    /**
     * @var ?float $page This is the page number to return. Defaults to 1.
     */
    public ?float $page;

    /**
     * @var ?value-of<SimulationRunControllerFindItemsRequestSortOrder> $sortOrder This is the sort order for pagination. Defaults to 'DESC'.
     */
    public ?string $sortOrder;

    /**
     * @var ?value-of<SimulationRunControllerFindItemsRequestSortBy> $sortBy This is the column to sort by. Defaults to 'createdAt'.
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
     *   simulationId?: ?string,
     *   runId?: ?string,
     *   status?: ?value-of<SimulationRunControllerFindItemsRequestStatus>,
     *   page?: ?float,
     *   sortOrder?: ?value-of<SimulationRunControllerFindItemsRequestSortOrder>,
     *   sortBy?: ?value-of<SimulationRunControllerFindItemsRequestSortBy>,
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
        $this->simulationId = $values['simulationId'] ?? null;
        $this->runId = $values['runId'] ?? null;
        $this->status = $values['status'] ?? null;
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
