<?php

class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('block_form');
        $this->setTitle(Mage::helper('siteblocks')->__('Block Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('siteblocks_block'); // В конролері едіта я встановлював, що Mage::registry('siteblocks_block'); це текущий рядок текущої таблиці
        $form = new Varien_Data_Form(
            array(
                'id' => 'edit_form', // - Айдішка форми
                'action' => $this->getUrl('*/*/save',array('block_id'=>$this->getRequest()->getParam('block_id'))), // Перенаправить мене на saveAction() + пост параметром передасться айдішка рядка
                'method' => 'post'
            )
        );

        $form->setHtmlIdPrefix('block_'); // у всіх дітей форми (інпутів селектів, філдсетів, ...) є айдішка. То до цієї айдішки додасться цей префікс

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('siteblocks')->__('General Information'), 'class' => 'fieldset-wide')); // У цьому філдсеті будуть знаходитись дыти формм - http://joxi.ru/eAOz1oKix1oNx2

        if ($model->getBlockId()) {
            $fieldset->addField('block_id', 'hidden', array(
                'name' => 'block_id1', // block_id1 - це прімарі кей моєї таблиці. Це я додаю схований інпут, щоб екшн на який я буду відправляти форму знав який рядок в базі йому редагувати
            ));
        }

        $fieldset->addField('title', 'text', array( // бе буде інпут з айдішкою  title і неймом title
            'name'      => 'title',
            'label'     => Mage::helper('siteblocks')->__('Block Title'),
            'title'     => Mage::helper('siteblocks')->__('Block Title'),
            'required'  => true,
        ));

        $fieldset->addField('block_status', 'select', array(
            'label'     => Mage::helper('siteblocks')->__('Status'),
            'title'     => Mage::helper('siteblocks')->__('Status'),
            'name'      => 'block_status',
            'required'  => true,
            'options'   => Mage::getModel('siteblocks/source_status')->toArray(), // Як бачу у мене і у гріді і у цій формі дані тягнуться з одного істочника. Це хороша практика
        ));


        $fieldset->addField('content', 'textarea', array(
            'name'      => 'content',
            'label'     => Mage::helper('siteblocks')->__('Content'),
            'title'     => Mage::helper('siteblocks')->__('Content'),
            'style'     => 'height:36em',
            'required'  => true,

        ));

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
}