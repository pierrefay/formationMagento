<?php
class Itelios_Store_Block_Adminhtml_Store_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('iteliosstore_form', array('legend'=>'Magasin Onglet 1'));
        $fieldset->addField('name', 'text',
            array(
                'label' => 'Name',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'name',
            ));
        $fieldset->addField('description', 'textarea',
            array(
                'label' => 'Description',
                'class' => 'required-entry',
                'required' => true,
                'name' => 'description',
            ));

        return parent::_prepareForm();
    }
}