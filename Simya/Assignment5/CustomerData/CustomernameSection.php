<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Simya\Assignment5\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;

class CustomernameSection implements SectionSourceInterface
{
    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customer;

    /**
     * Constructor method
     *
     * @param \Magento\Customer\Model\Session $customer
     */
    public function __construct(\Magento\Customer\Model\Session $customer)
    {
        $this->customer = $customer;
    }
    /**
     * @inheritdoc
     */
    public function getSectionData()
    {
        $customer = $this->customer->getCustomer();
        $customerName = $customer->getName();
        return [
            'fullname' => $customerName
        ];
    }
}
