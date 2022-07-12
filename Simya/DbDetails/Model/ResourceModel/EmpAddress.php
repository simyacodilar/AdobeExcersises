<?php

namespace Simya\DbDetails\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class EmpAddress extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'employee_address_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('employee_address', 'id');
        $this->_useIsObjectNew = true;
    }
}
