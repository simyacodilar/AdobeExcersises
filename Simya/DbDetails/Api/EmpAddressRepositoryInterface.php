<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Simya\DbDetails\Api;

use Simya\DbDetails\Api\Data\EmpAddressInterface;

interface EmpAddressRepositoryInterface
{
    /**
     * Get address by empId
     *
     * @param string $empId
     * @return EmpAddressInterface[]|null
     */
    public function getByEmployeeId($empId);

    /**
     * Get address by id
     *
     * @param string $id
     * @return EmpAddressInterface
     */
    public function getById($id);
}
