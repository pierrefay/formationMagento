<?php
class Itelios_Store_Block_Adminhtml_Store_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _construct()
    {
        parent::_construct();
        $this->setId('iteliosstoreGrid');
        $this->setDefaultSort('itelios_store_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('itelios_store/store')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }
    protected function _prepareColumns()
    {

        $this->addColumn('itelios_store_id',
            array(
                'header' => 'ID',
                'align' =>'right',
                'width' => '50px',
                'index' => 'itelios_store_id',
            ));
        $this->addColumn('Name',
            array(
                'header' => 'Name',
                'align' =>'left',
                'index' => 'name',
            ));

        return parent::_prepareColumns();
    }
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}