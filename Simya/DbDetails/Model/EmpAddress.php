<?php

namespace Simya\DbDetails\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Simya\DbDetails\Model\ResourceModel\EmpAddress as ResourceModel;
use Simya\DbDetails\Api\Data\EmpAddressInterface;
use Simya\DbDetails\Api\Data\EmpAddressExtensionInterface;

class EmpAddress extends AbstractExtensibleModel implements EmpAddressInterface
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
    /**
     * @inheritDoc
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }
    /**
     * @inheritDoc
     */
    public function setExtensionAttributes(EmpAddressExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
