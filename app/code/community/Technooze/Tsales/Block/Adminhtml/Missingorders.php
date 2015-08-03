<?php
class Technooze_Tsales_Block_Adminhtml_Missingorders extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'tsales';
        $this->_controller = 'adminhtml_missingorders';
        $this->_headerText = Mage::helper('tlog')->__('Manage Missing Orders.');
        $this->_addButtonLabel = Mage::helper('tlog')->__('Add New Tsale');

        parent::__construct();

        $this->_removeButton('add');

        $this->_addButton('search', array(
            'label' => $this->__('Search Missing Order'),
            'onclick' => "setLocation('{$this->getUrl('*/module/anyaction')}')",
        ));
    }
}
