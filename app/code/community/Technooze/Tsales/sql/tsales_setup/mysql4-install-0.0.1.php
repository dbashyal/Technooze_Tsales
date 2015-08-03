<?php
/* @var $this Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();
/**
 * Create table 'tsales_missingorders'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('tsales_missingorders'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'Entity Id')
    ->addColumn('quote_id', Varien_Db_Ddl_Table::TYPE_TEXT, 32, array('nullable'  => false,), 'Status')
    ->addColumn('order_increment_id', Varien_Db_Ddl_Table::TYPE_TEXT, 32, array('nullable'  => false,), 'Order Increment ID')
    ->addColumn('order_id', Varien_Db_Ddl_Table::TYPE_TEXT, 32, array('nullable'  => false,), 'Order ID')
    ->addColumn('status', Varien_Db_Ddl_Table::TYPE_TEXT, 128, array('nullable'  => false,), 'Label')
    ->addColumn('operator', Varien_Db_Ddl_Table::TYPE_TEXT, 256, array('nullable'  => false,), 'Recovered By')
    ->setComment('Missing Orders Recovered tracking Table.');
$installer->getConnection()->createTable($table);
$installer->endSetup();