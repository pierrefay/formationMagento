<?php
class Itelios_Store_Block_Adminhtml_Store_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function _construct()
    {
        parent::_construct();
        $this->_objectId = 'id';
        //vous remarquerez qu’on lui assigne le même blockGroup que le Grid Container
        $this->_blockGroup = 'itelios_store';
        //et le meme controlleur
        $this->_controller = 'adminhtml_store';
        //on definit les labels pour les boutons save et les boutons delete
        $this->_updateButton('save', 'label','Sauvegarder le magasin');
        $this->_updateButton('delete', 'label', 'Supprimer le magasin');
    }
}