<?php
class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('block_tabs'); // довільна назва
        $this->setDestElementId('edit_form'); // Це айдішка форми що я створював на минулому уроці
        $this->setTitle(Mage::helper('siteblocks')->__('Block Information'));
    }

    /**
     * в этом методе мы можем добавлять вкладки.
     * еще их можно добавлять через лейаут.
     *
     * Як зробити через лейаут цей чувак теж покаже
     */
    protected function _prepareLayout()
    {
        /**
         * 2) Загляните в реализацию метода addTab и увидете, что на вход можно подавать массив(я прописав тут масивом), объект, строку . И есть некоторые отличия.
         *
         * Тут я рекомендую, заглянуть в видео, где это я наглядно демонстрирую. Но и тут замолвлю словечко.
         *
         * Своїми словами скажу, що тут я вказую який блок рендерити. Вказати це можна різними способами. Тепер я вказуюю масивом у якому вказую які дані будуть у цій вкладці
         *
         *
         */
        $this->addTab('main_tab',array( // main_tab - довільна назва
            'label' => $this->__('Main'),
            'title' => $this->__('Main'),
            'content' => $this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks_edit_tab_main')->toHtml() // У цей блок я скопіював форму що робив на попередніх уроках
        ));

        /**
         * Вверху я писав що метод addTab має 2 аргументи. 2-й аргумент це блок який я буду рендерити.
         *
         * Вверху я цей аргумент передав як масив. Тут передам як строку
         *
         * Если мы передаем в метод строку, то класс вкладки обязан имплементить интерфейс Mage_Adminhtml_Block_Widget_Tab_Interface.
         *
         * Иначе вы получите ошибку. А интерфейс требует реализации 4 методов. Поэтому в примере мы используем 2 варианта для демонстрации.
         *
         * На практике, лучше использовать одинаковые способы добавления вкладок.
         *
         */

         $this->addTab('conditions_tab', 'siteblocks/adminhtml_siteblocks_edit_tab_conditions');

         // це саме тільки масивом
        /*$this->addTab('conditions_tab',array(
            'label' => $this->__('Conditions'),
            'title' => $this->__('Conditions'),
            'content' => $this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks_edit_tab_conditions')->toHtml()
        ));*/

        return parent::_prepareLayout();
    }
}