<?php

/**
 * Class IGN_Siteblocks_Model_Block
 *
 *  Це моя головна моделька. Модель для кондішнів расширяется от класса Mage_Rule_Model_Rule. Тобто спочатку я екстендився від класа від якого екстендяться всі модельки,
 *  А потім поміняв клас від якого екстенджусь на Mage_Rule_Model_Rule що кондінши працювали
*      Обовязково в ній має бути методы: getConditionsInstance, getActionsInstance
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
     * Він якимось чином повязаний кондішнами. Та і по назві понятно getConditionsInstance
     */
    public function getConditionsInstance()
    {
        return Mage::getModel('catalogrule/rule_condition_combine');
    }

    /**
     * Getter for rule actions collection
     *
     * этот метод, на самом деле нам не нужен, но интерфейс его требует
     *
     * @return Mage_CatalogRule_Model_Rule_Action_Collection
     */
    public function getActionsInstance()
    {
        return Mage::getModel('catalogrule/rule_action_collection');
    }

}