<?php
class Itelios_Store_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu('itelios_store/set_time')
            ->_addBreadcrumb('Gérer les magasins','Gérer les magasins');
        return $this;
    }
    public function indexAction()
    {
        $this->_initAction();
        $this->renderLayout();
    }
    public function editAction()
    {
        $testId = $this->getRequest()->getParam('id');
        $testModel = Mage::getModel('itelios_store/store')->load($testId);
        if ($testModel->getId() || $testId == 0)
        {
            Mage::register('itelios_store', $testModel);
            $this->loadLayout();
            $this->_setActiveMenu('itelios_store/itelios_storegrid');
            $this->_addBreadcrumb('Store Manager', 'Store Manager');
            $this->_addBreadcrumb('Store Description', 'Store Description');
            $this->getLayout()->getBlock('head')
                ->setCanLoadExtJs(true);
            $this->_addContent($this->getLayout()
                ->createBlock('itelios_store/adminhtml_store_edit'))
                ->_addLeft($this->getLayout()
                    ->createBlock('itelios_store/adminhtml_store_edit_tabs')
                );
            $this->renderLayout();
        }
        else
        {
            Mage::getSingleton('adminhtml/session')->addError('Le magasin n\'existe pas');
            $this->_redirect('*/*/');
        }
    }
    public function newAction()
    {
        $this->_forward('edit');
    }
    public function saveAction()
    {
        if ($this->getRequest()->getPost())
        {
            try {
                $postData = $this->getRequest()->getPost();
                $iteliosstoreModel = Mage::getModel('itelios_store/store');
                if( $this->getRequest()->getParam('id') <= 0 )
                    $iteliosstoreModel->setCreatedTime(
                        Mage::getSingleton('core/date')
                            ->gmtDate()
                    );
                $iteliosstoreModel
                    ->addData($postData)
                    ->setUpdateTime(
                        Mage::getSingleton('core/date')
                            ->gmtDate())
                    ->setId($this->getRequest()->getParam('id'))
                    ->save();
                Mage::getSingleton('adminhtml/session')
                    ->addSuccess('successfully saved');
                Mage::getSingleton('adminhtml/session')
                    ->settestData(false);
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e){
                Mage::getSingleton('adminhtml/session')
                    ->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')
                    ->settestData($this->getRequest()
                        ->getPost()
                    );
                $this->_redirect('*/*/edit',
                    array('id' => $this->getRequest()
                        ->getParam('id')));
                return;
            }
        }
        $this->_redirect('*/*/');
    }
    public function deleteAction()
    {
        if($this->getRequest()->getParam('id') > 0)
        {
            try
            {
                $testModel = Mage::getModel('itelios_store/store');
                $testModel->setId($this->getRequest()
                    ->getParam('id'))
                    ->delete();
                Mage::getSingleton('adminhtml/session')
                    ->addSuccess('successfully deleted');
                $this->_redirect('*/*/');
            }
            catch (Exception $e)
            {
                Mage::getSingleton('adminhtml/session')
                    ->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
}