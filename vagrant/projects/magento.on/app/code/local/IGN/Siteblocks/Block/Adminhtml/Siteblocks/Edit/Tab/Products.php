<?php

class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Tab_Products
        extends Mage_Adminhtml_Block_Widget_Form
        implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

#методы, которые требует интерфейс
    public function getTabTitle()
    {
        return $this->__('Products');
    }

    public function getTabLabel()
    {
        return $this->__('Products');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }

    public function getClass() {
        return 'ajax';
    }

    public function getTabClass() {
        return 'ajax';
    }

    /**
     * Це буде цей екшн productsAction() у файлі SiteblocksController.php
     *
     * Тобто це я написав, що коли буду переходити на цю вкладку, аяксом буде загружатись цей екшн
     *
     * Хендли для неї і будуть вже adminhtml_siteblocks_products так як екшн веде на цю сторінку
     *
     * Хоча а адресній строці і досі адреса adminhtml_siteblocks_edit
     *
     * @return string
     */
    public function getTabUrl() {

        /**
         * array('_current'=>true) - це важливо передати
         *
         * Коли я клацаю на рядок гріда в адмінці (рядок моєї бази), відкривається cтрорінка едіта гріда
         *
         * І у адресній строці є параметри (айдішка рядка і все інше)
         *
         * array('_current'=>true) якраз і передає ці параметри
         *
         * І після цього productsAction() буде знати що це за рядок
         */
        return $this->getUrl('*/*/products', array('_current'=>true));
    }

    /**
     * Init form
     */
   // public function __construct()
   // {
   //     parent::__construct();
   //     $this->setId('products_tab'); // довільна назва
   //     $this->setTitle(Mage::helper('siteblocks')->__('Products'));
   // }

    //protected function _prepareForm()
    //{
    //    $model = Mage::registry('siteblocks_block');
//
    //    // $form->setValues($model->getData()); //
    //    // $form->setUseContainer(true); // http://joxi.ru/E2pEgxwu9npaQA - хз нашо
    //    // $this->setForm($form);
//
    //    return parent::_prepareForm();
    //}

}
