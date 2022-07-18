<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Simya\DbDetails\Api;

use Simya\DbDetails\Api\Data\EmpAddressInterface;

interface EmpAddressRepositoryInterface
{

    /**
     * Get address by id
     *
     * @param string $id
     * @return EmpAddressInterface
     */
    public function getById($id);
    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Simya\DbDetails\Api\Data\AddressSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Get Address using employee Id
     *
     * @param $empId
     * @return EmpAddressInterface[]|null
     */
    public function getAddressByEmployee($empId);
}
