<?php
class Itelios_Store_Block_Adminhtml_Store_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function _construct()
    {
        parent::_construct();
        $this->setId('iteliosstore_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle('Information sur le magasin');
    }
    protected function _beforeToHtml()
    {
        $this->addTab('form_section', array(
            'label' => 'Informations sur le Magasin',
            'title' => 'Informations sur le Magasin',
            'content' => $this->getLayout()
                ->createBlock('itelios_store/adminhtml_store_edit_tab_form')
                ->toHtml()
        ));
        return parent::_beforeToHtml();
    }
}