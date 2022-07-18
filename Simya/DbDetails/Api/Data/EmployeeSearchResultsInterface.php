<?php
namespace Simya\DbDetails\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;


interface EmployeeSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get test Complete list.
     *
     * @return \Simya\DbDetails\Api\Data\EmployeeInfoInterface[]
     */
    public function getItems();

    /**
     * Set test Complete list.
     *
     * @param \Simya\DbDetails\Api\Data\EmployeeInfoInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
