<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Simya\DbDetails\Model\Data;

use Magento\Framework\Model\AbstractModel;
use Simya\DbDetails\Model\ResourceModel\EmployeeInfo as ResourceModel;
use Simya\DbDetails\Api\Data\EmployeeInfoInterface;

class EmployeeInfoData extends AbstractModel implements EmployeeInfoInterface
{
    /**
     * Employee InfoData constructor
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
    /**
     * @inheritDoc
     */
    public function getEmpId()
    {
        return $this->getData(self::EMP_ID);
    }
    /**
     * @inheritDoc
     */
    public function getCompanyId()
    {
        return $this->getData(self::COMPANY_ID);
    }

    /**
     * @inheritDoc
     */
    public function getEmpName()
    {
        return $this->getData(self::EMP_NAME);
    }

    /**
     * @inheritDoc
     */
    public function getEmpDob()
    {
        return $this->getData(self::EMP_DOB);
    }

    /**
     * @inheritDoc
     */
    public function getEmpAddress()
    {
        return $this->getData(self::EMP_ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function getEmpEmail()
    {
        return $this->getData(self::EMP_EMAIL);
    }

    /**
     * @inheritDoc
     */
    public function getEmpPhn()
    {
        return $this->getData(self::EMP_PHN);
    }

    /**
     * @inheritDoc
     */
    public function getEmpJoinAt()
    {
        return $this->getData(self::EMP_JOIN_AT);
    }


    /**
     * @inheritDoc
     */
    public function getEmpSalary()
    {
        return $this->getData(self::EMP_SALARY);
    }

    /**
     * @inheritDoc
     */
    public function getInsurancePercent()
    {
        return $this->getData(self::INSURANCE_PERCENT);
    }



    /**
     * @inheritDoc
     */
    public function getIsActive()
    {
        return $this->getData(self::ISACTIVE);
    }



    /**
     * @inheritDoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }


}
