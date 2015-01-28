<?php
class Itelios_Store_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function testhelperAction()
    {
        echo Mage::helper('itelios_store/data')->foisDeux(2);
        die('');
    }

    public function postAction()
    {
        $data   = $this->getRequest()->getPost();
            if(isset($data)){
            $store     = Mage::getModel('itelios_store/store')->setData($data);
            $validate = $store->validate();
            if($validate===true) {
                Mage::getSingleton('core/session')->addSuccess('Store Valide !');
            }else{
                foreach($validate as $error) {
                    Mage::getSingleton('core/session')->addError($error);
                }
            }
        }
        $this->_redirect('iteliosstore/index/index');
    }
}