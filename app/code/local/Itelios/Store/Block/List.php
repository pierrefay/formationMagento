<?php
class Itelios_Store_Block_List extends Mage_Core_Block_Template
{
    public function showList()
    {
        $retour = '';
        $collection = Mage::getModel('itelios_store/store')->getCollection();
        foreach($collection as $store) {
            $retour .= $store->getId().' '.$store->getName().'<br />';
        }
        return $retour;
    }
}