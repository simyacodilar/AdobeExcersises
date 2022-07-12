<?php

namespace Simya\DbDetails\Model;

use Magento\Framework\Model\AbstractModel;
use Simya\DbDetails\Model\ResourceModel\EmpAddress as ResourceModel;
use Simya\DbDetails\Api\Data\EmpAddressInterface;

class EmpAddress extends AbstractModel implements EmpAddressInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'employee_address_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @inheritDoc
     */
    public function getAddress()
    {
        return $this->_getData(self::ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }
}
