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
use Simya\DbDetails\Model\ResourceModel\EmployeeInfo\CollectionFactory;
use Magento\Framework\App\ResourceConnection;

class EmployeeInfoRepository implements EmployeeInfoRepositoryInterface
{

    /**
     * @var Simya\DbDetails\Model\EmployeeInfoFactory $employeeInfoFactory
     */
    protected $employeeInfoFactory;
    /**
     * @var ResourceConnection
     */
    private ResourceConnection $resourceConnection;

    /**
     * @param EmployeeInfoFactory $employeeInfoFactory
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(
        EmployeeInfoFactory $employeeInfoFactory,
        CollectionFactory $employeeCollectionFactory,
        ResourceConnection $resourceConnection
    ) {
        $this->_employeeInfoFactory = $employeeInfoFactory;
        $this->employeeCollectionFactory = $employeeCollectionFactory;
        $this->resourceConnection = $resourceConnection;
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

    /**
     * function to return array of objects
     *
     * @return array
     * @throws NoSuchEntityException
     */
    public function getDetails()
    {
        $data1= $this->getById(1);
        $data2= $this->getById(2);
        return [$data1->getData(),$data2->getData()];

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
