<?php

namespace Simya\DbDetails\Model\ResourceModel\EmpAddress;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Simya\DbDetails\Model\EmpAddress as Model;
use Simya\DbDetails\Model\ResourceModel\EmpAddress as ResourceModel;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'employee_address_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
