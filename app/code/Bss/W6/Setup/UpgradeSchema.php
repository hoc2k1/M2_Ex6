<?php

namespace Bss\W6\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

            $salesOrderTable = $setup->getTable('sales_order');

            $setup->getConnection()->addColumn(
                $salesOrderTable,
                'w6_new_column',
                [
                    'type' => Table::TYPE_TEXT,
                    'nullable' => true,
                    'comment' => 'Week 6 new column'
                ]
            );

        $setup->endSetup();
    }
}
