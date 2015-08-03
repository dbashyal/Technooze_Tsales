<?php
class Technooze_Tsales_Model_Resource_Missingorders extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * Model Initialization
     */
    protected function _construct()
    {
        $this->_init('tsales/missingorders', 'entity_id');
    }
}
