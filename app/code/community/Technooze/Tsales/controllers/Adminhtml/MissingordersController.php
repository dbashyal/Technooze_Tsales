<?php
class Technooze_Tsales_Adminhtml_MissingordersController
    extends Mage_Adminhtml_Controller_Action
{

    /**
     * Additional initialization
     *
     */
    protected function _construct()
    {
        $this->setUsedModuleName('Technooze_Tsales');
    }

    /**
     * Initialize the controller
     * @return Object
     */
    protected function _initAction() {
        $this->loadLayout()
            ->_setActiveMenu('sales/order/tsales')
            ->_addBreadcrumb($this->__('Sales'), $this->__('Sales'))
            ->_addBreadcrumb($this->__('Orders'), $this->__('Orders'))
            ->_addBreadcrumb($this->__('Tsales'), $this->__('Missing Orders'));
        return $this;
    }

    /**
     * Index Action
     *
     * @return void
     */
    public function indexAction() {
        $this->_forward('grid');
    }

    public function gridAction()
    {
        $this->loadLayout();
        $this->_addContent($this->getLayout()->createBlock('tsales/adminhtml_missingorders'));
        $this->renderLayout();
    }

    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('sales/order/tsales');
    }
}
