<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Simya\DbDetails\Api\Data;

Interface EmpAddressInterface
{
    /**
     * Constants for keys of data array.
     */
    public  const ID = 'id';
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
}
