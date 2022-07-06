<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Simya\DbDetails\Model;

use Simya\DbDetails\Model\ResourceModel\EmployeeInfo as EmployeeResource;

class EmployeeInfo extends \Magento\Framework\Model\AbstractModel
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
}
