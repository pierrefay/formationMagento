<?php
class Itelios_Store_Model_Resource_Store extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('itelios_store/store', 'itelios_store_id');
    }
}