<?php

class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('block_form'); // довільна назва
        $this->setTitle(Mage::helper('siteblocks')->__('Block Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('siteblocks_block'); // В конролері едіта я встановлював, що Mage::registry('siteblocks_block'); це текущий рядок текущої таблиці
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form', // - Айдішка форми
                'action' => $this->getUrl('*/*/save',array('block_id'=>$this->getRequest()->getParam('block_id'))), // Перенаправить мене на saveAction() + пост параметром передасться айдішка рядка
                'method' => 'post',
                'enctype' => 'multipart/form-data'
            )
        );

        $form->setHtmlIdPrefix('block_'); // у всіх дітей форми (інпутів селектів, філдсетів, ...) є айдішка. То до цієї айдішки додасться цей префікс

        /**
         * Заповнити дані форми. Тобто коли я приходжу на сторінку редагування рядка таблиці, текущі дані з таблиці уже у формі.
         * Якщо після збереження даних була помилка, філди форми всерівно будуть заповнені із за того шо у змінну $model
         * попали дані з регістру $model = Mage::registry('siteblocks_block'); А у регістр я бодав ці дані у екшні saveAction()
         *
         */

        $form->setValues($model->getData()); //
        $form->setUseContainer(true); // http://joxi.ru/E2pEgxwu9npaQA - хз нашо
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Load Wysiwyg on demand and Prepare layout
     *
     * Це тільки для візівіка
     *
     * добавили этот метод, в которм выставляем флаг в блок head, если редактор включен в настройках
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
    }
}