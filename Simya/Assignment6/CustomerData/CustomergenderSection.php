<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Simya\Assignment6\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class CustomergenderSection implements SectionSourceInterface
{
    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customer;

    /**
     * Constructor method
     *
     * @param \Magento\Customer\Model\Session $customer
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(\Magento\Customer\Model\Session $customer,ScopeConfigInterface $scopeConfig)
    {
        $this->customer = $customer;
        $this->scopeConfig = $scopeConfig;
    }
    public function getEmiOptions()
    {
        return json_decode($this->scopeConfig->getValue("emi_cofig/emi_options_group/emi_options"),true);
    }
    /**
     * @inheritdoc
     */
    public function getSectionData()
    {
        $customer = $this->customer->getCustomer();
        $customerGender = $customer->getGender();
        if(!$customerGender)
        {
            $customerGender = 1;
        }
        $emiarray=$this->getEmiOptions();
        $emi= [];
        foreach ($emiarray as $emis) {
            if($emis['choose_gender'] == $customerGender){
                $emi[] = [
                    'tenure' => $emis['tenure'],
                    'interest' => $emis['interestrate']
                ];
            }
        }
        return [
            'gender' => $customerGender,
            'emi' => $emi
        ];
    }
}
