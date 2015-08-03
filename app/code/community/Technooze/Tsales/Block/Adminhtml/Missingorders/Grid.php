<?php
class Technooze_Tsales_Block_Adminhtml_Missingorders_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('tsalesGrid');
        $this->setDefaultSort('entity_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->unsetChild('search_button');
        $this->setChild('search_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('adminhtml')->__('Search Recovered Orders'),
                    'onclick'   => $this->getJsObjectName().'.doFilter()',
                    'class'   => 'task'
                ))
        );
        $this->setChild('search_missing_button',
            $this->getLayout()->createBlock('adminhtml/widget_button')
                ->setData(array(
                    'label'     => Mage::helper('adminhtml')->__('Look For New Missing Order'),
                    'onclick'   => 'jQuery(\'#tsalesGrid\').append(\'<input type=\\\'hidden\\\' name=\\\'search_missing_button\\\' value=\\\'search_missing_button\\\' />\');' . $this->getJsObjectName().'.doFilter()',
                    'class'   => 'task'
                ))
        );
        return $this;
    }

    protected function _prepareCollection()
    {
        $this->setCollection(Mage::getModel('tsales/missingorders')->getCollection());
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addExportType('*/*/exportCsv',
                 Mage::helper('tsales')->__('CSV'));

        $this->addColumn('entity_id', array(
            'header'    => Mage::helper('tsales')->__('ID'),
            'align'     => 'right',
            'width'     => '50px',
            'index'     => 'entity_id',
            'type'      => 'number',
        ));

        $this->addColumn('quote_id', array(
            'header'    => Mage::helper('tlog')->__('Quote ID'),
            'align'     => 'left',
            'index'     => 'quote_id',
        ));

        $this->addColumn('order_increment_id', array(
            'header'    => Mage::helper('tlog')->__('Order Increment ID'),
            'align'     => 'left',
            'index'     => 'order_increment_id',
        ));

        $this->addColumn('order_id', array(
            'header'    => Mage::helper('tlog')->__('Order Entity ID'),
            'align'     => 'left',
            'index'     => 'order_id',
        ));

        $this->addColumn('status', array(
            'header'    => Mage::helper('tlog')->__('Status'),
            'align'     => 'left',
            'index'     => 'status',
        ));

        $this->addColumn('operator', array(
            'header'    => Mage::helper('tlog')->__('Order Entity ID'),
            'align'     => 'left',
            'index'     => 'operator',
        ));

        Mage::dispatchEvent('tsales_adminhtml_grid_prepare_columns', array('block'=>$this));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

    public function getMainButtonsHtml()
    {
        $html = parent::getMainButtonsHtml();
        if($html){
            $html.= $this->getChildHtml('search_missing_button');
        }
        return $html;
    }

}
