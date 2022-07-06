<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Simya\DbDetails\Api\Data;

interface EmployeeInfoInterface
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
    public const IS_ACTIVE = 'is_active';
    public const CREATED_AT = 'created_at';

    /**
     * Gets the EmpId.
     *
     * @api
     * @return int
     */
    public function getEmpId();

    /**
     * Gets the CompanyId
     *
     * @api
     * @return int
     */
    public function getCompanyId();

    /**
     * Gets the Employee name
     *
     * @api
     * @return string
     */
    public function getEmpName();

    /**
     * Gets the Employee DOb.
     *
     * @api
     * @return string
     */
    public function getEmpDob();

    /**
     * Gets the Employee Address.
     *
     * @api
     * @return string
     */
    public function getEmpAddress();

    /**
     * Gets the Employee Email.
     *
     * @api
     * @return string
     */
    public function getEmpEmail();

    /**
     * Gets the Employee phone.
     *
     * @api
     * @return string
     */
    public function getEmpPhn();

    /**
     * Gets the Employee Joinig Date.
     *
     * @api
     * @return string
     */
    public function getEmpJoinAt();

    /**
     * Gets the Employee Salary.
     *
     * @api
     * @return string
     */
    public function getEmpSalary();

    /**
     * Gets the Employee Insurance Rate.
     *
     * @api
     * @return string
     */
    public function getInsurancePercent();

    /**
     * Gets the Employee Active.
     *
     * @api
     * @return string
     */
    public function getIsActive();

    /**
     * Gets the Employee Created Time.
     *
     * @api
     * @return string
     */
    public function getCreatedAt();

}
