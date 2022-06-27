<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Unit4\VendorEntity\Setup\Patch\Schema;

use Magento\Framework\Setup\Patch\PatchInterface;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class VendorColumn implements SchemaPatchInterface
{
    /**
     * @var \Magento\Framework\Setup\SchemaSetupInterface;
     */
    protected $moduleSchemaSetup;

    /**
     * VendorColumn constructor.
     * @param SchemaSetupInterface $moduleSchemaSetup
     */
    public function __construct(SchemaSetupInterface $moduleSchemaSetup)
    {
        $this->moduleSchemaSetup = $moduleSchemaSetup;
    }

    /**
     * Apply method
     *
     * @return SchemaPatchInterface|void
     */
    public function apply()
    {
        $this->moduleSchemaSetup->startSetup();
        $this->moduleSchemaSetup->getConnection()->addColumn(
            'vendor_entity',
            'goods_type',
            [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'length' => 64,
                'unsigned' => true,
                'nullable' => false,
                'comment' => 'Vendor goods type'
            ]
        );
        $this->moduleSchemaSetup->endSetup();
    }

    /**
     * GetDependencies method
     *
     * @return array|string[]
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * Get Aliases method
     *
     * @return array|string[]
     */
    public function getAliases()
    {
        return [];
    }
}
