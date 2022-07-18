<?php
namespace Simya\DbDetails\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface for preorder Complete search results.
 * @api
 */
interface AddressSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get test Complete list.
     *
     * @return \Simya\DbDetails\Api\Data\EmpAddressInterface[]
     */
    public function getItems();

    /**
     * Set test Complete list.
     *
     * @param \Simya\DbDetails\Api\Data\EmpAddressInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
