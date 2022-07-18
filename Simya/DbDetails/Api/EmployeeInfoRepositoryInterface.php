<?php
/**
 *
 * Copyright © Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Simya\DbDetails\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Simya\DbDetails\Api\Data\EmployeeInfoInterface;

interface EmployeeInfoRepositoryInterface
{
    /**
     * Get employee by id
     *
     * @param string $empId
     * @return EmployeeInfoInterface
     */
    public function getById(string $empId);

    /**
     * Delete employee by id
     *
     * @param string $empId
     * @return mixed
     */
    public function deleteById($empId);

    /**
     * Save
     *
     * @param EmployeeInfoInterface $employee
     * @return boolean
     */
    public function save(EmployeeInfoInterface $employee);

    /**
     * Get List
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Simya\DbDetails\Api\Data\EmployeeSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

}
