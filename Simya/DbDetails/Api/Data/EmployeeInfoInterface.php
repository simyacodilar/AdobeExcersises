<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Simya\DbDetails\Api\Data;

interface EmployeeInfoInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    /**
     * Constants for keys of data array.
     */
    public const EMP_ID = 'emp_id';
    public const COMPANY_ID = 'company_id';
    public const EMP_NAME = 'emp_name';
    public const EMP_DOB = 'emp_dob';
    public const EMP_ADDRESS = 'emp_address';
    public const EMP_EMAIL = 'emp_email';
    public const EMP_PHN = 'emp_phn';
    public const EMP_JOIN_AT = 'emp_join_at';
    public const EMP_SALARY = 'emp_salary';
    public const INSURANCE_PERCENT = 'insurance_percent';
    public const ISACTIVE = 'is_active';

    /**
     * Gets the EmpId.
     *
     * @api
     * @return int
     */
    public function getEmpId();
    /**
     * Sets the EmpId.
     *
     * @param  int $empId
     * @return int
     */
    public function setEmpId($empId);
    /**
     * Gets the CompanyId
     *
     * @api
     * @return int
     */
    public function getCompanyId();
    /**
     * Sets the CompanyId.
     *
     * @param  string $companyid
     * @return string
     */
    public function setCompanyId($companyid);
    /**
     * Gets the Employee name
     *
     * @api
     * @return string
     */
    public function getEmpName();
    /**
     * Sets the Employee name.
     *
     * @param  string $empName
     * @return string
     */
    public function setEmpName($empName);
    /**
     * Gets the Employee DOb.
     *
     * @api
     * @return string
     */
    public function getEmpDob();
    /**
     * Sets the Employee Dob
     *
     * @param  string $empDob
     * @return string
     */
    public function setEmpDob($empDob);
    /**
     * Gets the Employee Address.
     *
     * @api
     * @return string
     */
    public function getEmpAddress();
    /**
     * Sets the Employee Address
     *
     * @param  string $empAddress
     * @return string
     */
    public function setEmpAddress($empAddress);
    /**
     * Gets the Employee Email.
     *
     * @api
     * @return string
     */
    public function getEmpEmail();
    /**
     * Sets the Employee Email
     *
     * @param  string $empemail
     * @return string
     */
    public function setEmpEmail($empemail);
    /**
     * Gets the Employee phone.
     *
     * @api
     * @return string
     */
    public function getEmpPhn();
    /**
     * Sets the Employee phone
     *
     * @param  int $empPhn
     * @return int
     */
    public function setEmpPhn($empPhn);
    /**
     * Gets the Employee Joinig Date.
     *
     * @api
     * @return string
     */
    public function getEmpJoin();
    /**
     * Sets the Employee Joining Date
     *
     * @param  string $empjoin
     * @return string
     */
    public function setEmpJoin($empjoin);
    /**
     * Gets the Employee Salary.
     *
     * @api
     * @return string
     */
    public function getEmpSalary();
    /**
     * Sets the Employee Salary
     *
     * @param  string $empsal
     * @return string
     */
    public function setEmpSalary($empsal);
    /**
     * Gets the Employee Insurance Rate.
     *
     * @api
     * @return string
     */
    public function getEmpInsurance();
    /**
     * Sets the Employee Insurance Rate
     *
     * @param  string $empinsurance
     * @return string
     */
    public function setEmpInsurance($empinsurance);
    /**
     * Gets the Employee Active.
     *
     * @api
     * @return string
     */
    public function getIsActive();
    /**
     * Sets the Employee Active
     *
     * @param  string $isactive
     * @return string
     */
    public function setIsActive($isactive);

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Simya\DbDetails\Api\Data\EmployeeInfoExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Simya\DbDetails\Api\Data\EmployeeInfoExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Simya\DbDetails\Api\Data\EmployeeInfoExtensionInterface $extensionAttributes);

}
