<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Simya\DbDetails\Model;

use Simya\DbDetails\Api\EmployeeInfoRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Simya\DbDetails\Model\EmployeeInfoFactory as EmployeeInfoFactory;

class EmployeeInfoRepository implements EmployeeInfoRepositoryInterface
{
    /**
     * @var Simya\DbDetails\Model\EmployeeInfoFactory $employeeInfoFactory
     */
    protected $employeeInfoFactory;
    /**
     * @param EmployeeInfoFactory $employeeInfoFactory
     */
    public function __construct(
        EmployeeInfoFactory $employeeInfoFactory
    ) {
        $this->_employeeInfoFactory = $employeeInfoFactory;
    }

    /**
     * Gets the EmployeeDetails data by Id
     *
     * @param  int $empId
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getById($empId)
    {
        return $this->_employeeInfoFactory->create()->load($empId, 'emp_id');
    }
}
