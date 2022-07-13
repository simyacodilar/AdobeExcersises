<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Simya\DbDetails\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use Simya\DbDetails\Api\Data\EmployeeInfoInterface;
use Simya\DbDetails\Model\ResourceModel\EmployeeInfo as EmployeeResource;
use Simya\DbDetails\Api\Data\EmployeeInfoExtensionInterface;

class EmployeeInfo extends AbstractExtensibleModel implements EmployeeInfoInterface
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    public function _construct()
    {
        $this->_init(EmployeeResource::class);
    }
    /**
     * @inheritDoc
     */
    public function getEmpId()
    {
        return $this->_getData(self::EMP_ID);
    }

    /**
     * @inheritDoc
     */
    public function setEmpId($empId)
    {
        return $this->setData(self::EMP_ID, $empId);
    }

    /**
     * @inheritDoc
     */
    public function getCompanyId()
    {
        return $this->_getData(self::COMPANY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCompanyId($companyid)
    {
        return $this->setData(self::COMPANY_ID, $companyid);
    }

    /**
     * @inheritDoc
     */
    public function getEmpName()
    {
        return $this->_getData(self::EMP_NAME);
    }

    /**
     * @inheritDoc
     */
    public function setEmpName($empName)
    {
        return $this->setData(self::EMP_NAME, $empName);
    }

    /**
     * @inheritDoc
     */
    public function getEmpDob()
    {
        return $this->_getData(self::EMP_DOB);
    }

    /**
     * @inheritDoc
     */
    public function setEmpDob($empDob)
    {
        return $this->setData(self::EMP_DOB, $empDob);
    }

    /**
     * @inheritDoc
     */
    public function getEmpAddress()
    {
        return $this->_getData(self::EMP_ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function setEmpAddress($empAddress)
    {
        return $this->getData(self::EMP_ID);
    }

    /**
     * @inheritDoc
     */
    public function getEmpEmail()
    {
        return $this->_getData(self::EMP_EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function setEmpEmail($empemail)
    {
        return $this->setData(self::EMP_EMAIL, $empemail);
    }

    /**
     * @inheritDoc
     */
    public function getEmpPhn()
    {
        return $this->_getData(self::EMP_PHN);
    }

    /**
     * @inheritDoc
     */
    public function setEmpPhn($empPhn)
    {
        return $this->setData(self::EMP_PHN, $empPhn);
    }

    /**
     * @inheritDoc
     */
    public function getEmpJoin()
    {
        return $this->_getData(self::EMP_JOIN_AT);
    }

    /**
     * @inheritDoc
     */
    public function setEmpJoin($empjoin)
    {
        return $this->setData(self::EMP_JOIN_AT, $empjoin);
    }

    /**
     * @inheritDoc
     */
    public function getEmpSalary()
    {
        return $this->_getData(self::EMP_SALARY);
    }

    /**
     * @inheritDoc
     */
    public function setEmpSalary($empsal)
    {
        return $this->setData(self::EMP_SALARY, $empsal);
    }

    /**
     * @inheritDoc
     */
    public function getEmpInsurance()
    {
        return $this->_getData(self::INSURANCE_PERCENT);
    }

    /**
     * @inheritDoc
     */
    public function setEmpInsurance($empinsurance)
    {
        return $this->setData(self::INSURANCE_PERCENT, $empinsurance);
    }

    /**
     * @inheritDoc
     */
    public function getIsActive()
    {
        return $this->_getData(self::ISACTIVE);
    }

    /**
     * @inheritDoc
     */
    public function setIsActive($isactive)
    {
        return $this->setData(self::ISACTIVE, $isactive);
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
    public function setExtensionAttributes(EmployeeInfoExtensionInterface $extensionAttributes)
    {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
