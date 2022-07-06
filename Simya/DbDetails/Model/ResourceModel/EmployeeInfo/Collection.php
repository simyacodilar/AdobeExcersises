<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);
namespace Simya\DbDetails\Model\ResourceModel\EmployeeInfo;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Simya\DbDetails\Model\EmployeeInfo as EmployeeModel;
use Simya\DbDetails\Model\ResourceModel\EmployeeInfo as EmployeeResource;

class Collection extends AbstractCollection
{
    /**
     * Initialize resource collection
     *
     * @return void
     */
    public function _construct()
    {
        $$this->_init(EmployeeModel::class, EmployeeResource::class);
    }
}
