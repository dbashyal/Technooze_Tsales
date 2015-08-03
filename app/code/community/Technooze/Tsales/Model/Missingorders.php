<?php
class Technooze_Tsales_Model_Missingorders extends Mage_Core_Model_Abstract
{
    /**
     * @var array
     */
    protected $_keys = array();

    protected function _construct()
    {
        $this->_init('tsales/missingorders');
    }

    public function reset()
    {
        foreach ($this->_data as $data){
            if (is_object($data) && method_exists($data, 'reset')){
                $data->reset();
            }
        }
        return $this;
    }

    public function getCollection()
    {
        $collection = parent::getCollection();
        $filter = Mage::app()->getRequest()->getParam('filter');
        if($filter){
            $filterData = Mage::app()->getHelper('adminhtml')->prepareFilterString($filter);
            Mage::log($filterData);
        }
        return $collection;
    }
}
