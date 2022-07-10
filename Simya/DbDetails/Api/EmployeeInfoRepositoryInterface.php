<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Simya\DbDetails\Api;

interface EmployeeInfoRepositoryInterface
{

    /**
     * Get info about Employee by employee id
     *
     * @param  int $employeeId
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($employeeId);

    /**
     * function to return array of objects
     *
     * @return array
     * @throws NoSuchEntityException
     */
    public function getDetails();

    /**
     * @param $id
     * @return mixed
     */
    public function getEmployeedetails($id);
}
