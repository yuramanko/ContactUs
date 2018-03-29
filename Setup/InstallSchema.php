<?php

namespace Manko\ContactUs\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

    public function install(
    \Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('manko_contact_us')) {
            $table = $installer->getConnection()->newTable(
                            $installer->getTable('manko_contact_us')
                    )
                    ->addColumn(
                            'response_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true,
                            ], 'Response ID'
                    )
                    ->addColumn(
                            'parent_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, 1, [], 'Response Parent ID'
                    )
                    ->addColumn(
                            'theme', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, ['nullable => false'], 'Response Theme'
                    )
                    ->addColumn(
                            'response_content', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, '64k', [], 'Response Content'
                    )
                    ->addColumn(
                            'name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'Response User Name'
                    )
                    ->addColumn(
                            'email', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'Response User Email'
                    )
                    ->addColumn(
                            'phone', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [], 'Response User Phone'
                    )
                    ->addColumn(
                            'status', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, 1, [], 'Response Status'
                    )
                    ->addColumn(
                            'created_at', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT], 'Created At'
                    )->addColumn(
                            'updated_at', \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE], 'Updated At')
                    ->setComment('Response User Table For Contact Us');
            $installer->getConnection()->createTable($table);

            $installer->getConnection()->addIndex(
                    $installer->getTable('manko_contact_us'), $setup->getIdxName(
                            $installer->getTable('manko_contact_us'), ['theme', 'name', 'response_content'], \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                    ), ['theme', 'name', 'response_content'], \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
            );
        }
        $installer->endSetup();
    }

}
