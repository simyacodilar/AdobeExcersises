<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Simya\DbDetails\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class Employees implements DataPatchInterface
{
    /**
     * @var ModuleDataSetupInterface
     */
    protected $moduleDataSetup;

    public function __construct(ModuleDataSetupInterface $moduleDataSetup)
    {
        $this->moduleDataSetup = $moduleDataSetup;
    }
    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $this->moduleDataSetup->getConnection()->insertMultiple(
            'employee_info',
            [
                [
                    'company_id'    => '1',
                    'emp_name' => 'Simya Sreejith',
                    'emp_dob'     => '1997-11-02',
                    'emp_address' => 'Thejas Vengeri PO kozhikode kerala 673010' ,
                    'emp_email' => 'simyasreejith@gmail.com',
                    'emp_phn' => '8769054321',
                    'emp_join_at' => '2021-02-09 00:00:00',
                    'emp_salary' => '35000',
                    'insurance_percent' => '15',
                    'is_active' => '1'
                ],
                [
                    'company_id'    => '1',
                    'emp_name' => 'Abhirami S',
                    'emp_dob'     => '1998-05-12',
                    'emp_address' => 'Indivaram Beypore PO kozhikode kerala 673010' ,
                    'emp_email' => 'abirami.s@codilar.com',
                    'emp_phn' => '7767890543',
                    'emp_join_at' => '2021-08-27 00:00:00',
                    'emp_salary' => '25000',
                    'insurance_percent' => '10',
                    'is_active' => '1'
                ]

            ]
        );

        $this->moduleDataSetup->endSetup();
    }

    /**
     * Get Dependencies method
     *
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Get Aliaces method
     *
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }
}
