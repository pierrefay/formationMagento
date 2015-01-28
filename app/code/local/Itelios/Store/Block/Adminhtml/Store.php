<?php
class Itelios_Store_Block_Adminhtml_Store extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function _construct()
    {
        //on indique ou va se trouver le block
        $this->_controller = 'adminhtml_store';
        $this->_blockGroup = 'itelios_store';
        //le texte du header qui s’affichera dans l’admin
        $this->_headerText = 'Gestion des Magasins';
        //le nom du bouton pour ajouter une un contact
        $this->_addButtonLabel = 'Ajouter un magasin';
    }
}