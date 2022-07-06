<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);
namespace Simya\DbDetails\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class EmployeeInfo extends AbstractDb
{

    /**
     * Initialize resource
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init('employee_info', 'emp_id');
    }
}
