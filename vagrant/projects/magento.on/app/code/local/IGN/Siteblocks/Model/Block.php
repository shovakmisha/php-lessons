<?php

/**
 * Class IGN_Siteblocks_Model_Block
 *
 * @method getBlockStatus()
 * @method getContent()
 */
class IGN_Siteblocks_Model_Block extends Mage_Rule_Model_Abstract {

    protected $_eventPrefix = 'siteblocks_block';

    public function _construct()
    {
        parent::_construct();
        $this->_init('siteblocks/block'); //Все в соотвествии с указанными в config.xml параметрами
    }

    public function getImageSrc()
    {
        return Mage::getBaseUrl('media') . 'siteblocks' . DS . $this->getImage();
    }


    /**
     * Getter for rule conditions collection
     *
     * @return Mage_CatalogRule_Model_Rule_Condition_Combine
     *
     * этот метод, на самом деле нам не нужен, но интерфейс его требует
     */
    public function getConditionsInstance()
    {
        return Mage::getModel('catalogrule/rule_condition_combine');
    }

    /**
     * Getter for rule actions collection
     *
     * @return Mage_CatalogRule_Model_Rule_Action_Collection
     */
    public function getActionsInstance()
    {
        return Mage::getModel('catalogrule/rule_action_collection');
    }

}