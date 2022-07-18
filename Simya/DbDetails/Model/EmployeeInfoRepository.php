<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Simya\DbDetails\Model;

use Simya\DbDetails\Api\EmployeeInfoRepositoryInterface;
use Simya\DbDetails\Api\Data\EmployeeInfoInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Simya\DbDetails\Model\EmployeeInfoFactory as EmployeeInfoFactory;
use Simya\DbDetails\Api\Data\EmployeeInfoInterfaceFactory;
use Magento\Framework\App\ResourceConnection;
use Simya\DbDetails\Model\ResourceModel\EmployeeInfo as ResourceModel;

class EmployeeInfoRepository implements EmployeeInfoRepositoryInterface
{

    /**
     * @var Simya\DbDetails\Model\EmployeeInfoFactory $employeeInfoFactory
     */
    protected $employeeInfoFactory;

    /**
     * @var ResourceModel
     */
    private ResourceModel $resourceModel;

    /**
     * @param EmployeeInfoFactory $employeeInfoFactory
     * @param ResourceConnection $resourceConnection
     * @param ResourceModel $resourceModel
     */
    public function __construct(
        EmployeeInfoFactory $employeeInfoFactory,
        EmployeeInfoInterfaceFactory $employeeInfo,
        ResourceConnection $resourceConnection,
        ResourceModel $resourceModel
    ) {
        $this->_employeeInfoFactory = $employeeInfoFactory;
        $this->resourceConnection = $resourceConnection;
        $this->employeeInfo = $employeeInfo;
        $this->resourceModel = $resourceModel;
    }

    /**
     * Gets the EmployeeDetails data by Id
     *
     * @param  int $empId
     * @return EmployeeInfoInterface
     * @throws NoSuchEntityException
     */
    public function getById($empId)
    {
        $employeeModel = $this->_employeeInfoFactory->create();
        $this->resourceModel->load($employeeModel,$empId);
        return $employeeModel;
    }

    /**
     * function to return array of objects
     *
     * @return array
     * @throws NoSuchEntityException
     */
    public function getDetails($id)
    {
        $employeeModel = $this->_employeeInfoFactory->create();
        $this->resourceModel->load($employeeModel,$id);
        return $employeeModel;

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEmployeedetails($id){
        $connection = $this->resourceConnection->getConnection();
        $select = $connection->select()
            ->from(
                ['main_table' => 'employee_info'],
                [
                    'main_table.*',
                    'address_table.address'
                ]
            )
            ->join(
                ['address_table' => 'employee_address'],
                'main_table.emp_id = address_table.emp_id'
            )->where('main_table.emp_id = ?', $id);

        return $connection->fetchAll($select);
    }

}
