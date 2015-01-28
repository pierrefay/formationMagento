<?php
/*
 * @var $installer Mage_Core_Model_Resource_Setup
 */
$installer = $this;
$installer->startSetup();
$connection = $installer->getConnection();
$connection->beginTransaction();
try {
    $table  = $connection->newTable($installer->getTable('pfay_test/listing_ville'))
        ->addColumn('id_listing_ville', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
            'identity' => true,
        ), 'ID listing ville')
        ->addColumn('pays', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => false,
        ), 'Pays')
        ->addColumn('nom', Varien_Db_Ddl_Table::TYPE_VARCHAR, null, array(
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => false,
        ), 'Nom de la ville');
    $connection->createTable($table);
    $connection->commit();
}catch(Exception $e) {
    Mage::log($e->getMessage());
    $connection->rollBack();
}
$installer->endSetup();
?>
<?php echo  Mage::getStoreConfig('ecard_section/ecard_group/ecard_field'); ?>