<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Simya\DbDetails\Api\Data;

    Interface EmpAddressInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    /**
     * Constants for keys of data array.
     */
    public  const ID = 'id';
    public const EMPLID = 'emp_id';
    public const ADDRESS = 'address';
    /**
     * Gets the Id.
     *
     * @api
     * @return int
     */
    public function getId();
    /**
     * Sets the EmpId.
     *
     * @param  int $Id
     * @return int
     */
    public function setId($Id);
        /**
         * Gets the Employee Id.
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
     * Gets the Address
     *
     * @api
     * @return string
     */
    public function getAddress();
    /**
     * Sets the Address.
     *
     * @param  string $address
     * @return string
     */
    public function setAddress($address);
    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \Simya\DbDetails\Api\Data\EmpAddressExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     *
     * @param \Simya\DbDetails\Api\Data\EmpAddressExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(\Simya\DbDetails\Api\Data\EmpAddressExtensionInterface $extensionAttributes);

}
