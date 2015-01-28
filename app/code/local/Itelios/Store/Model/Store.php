<?php
class Itelios_Store_Model_Store extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('itelios_store/store');
    }

    public function validate()
    {
        $errors = array();
        if (!Zend_Validate::is($this->getName(), 'NotEmpty')) {
            $errors[] = Mage::helper('core')->__('Name can\'t be empty');
        }

        if (!Zend_Validate::is($this->getDescription(), 'NotEmpty')) {
            $errors[] = Mage::helper('core')->__('Description can\'t be empty');
        }

        if (empty($errors)) {
            return true;
        }
        return $errors;
    }
}