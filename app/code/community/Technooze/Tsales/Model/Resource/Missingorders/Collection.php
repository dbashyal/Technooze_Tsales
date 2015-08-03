<?php
class Technooze_Tsales_Model_Resource_Missingorders_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Model initialization
     *
     */
    protected function _construct()
    {
        $this->_init('tsales/missingorders');
    }
}
