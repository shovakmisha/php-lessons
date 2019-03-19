<?php

class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Tab_Main extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('main_form'); // довільна назва
        $this->setTitle(Mage::helper('siteblocks')->__('Block Information'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('siteblocks_block'); // В конролері едіта я встановлював, що Mage::registry('siteblocks_block'); це текущий рядок текущої таблиці

        /**
         * Цей кусок форми вставиться в форму з файла Form.php Скоріш за все тому що у тому файлі є строчка $form->setUseContainer(true);
         *
         * І по цій строчці і оприділяється щ це контейнер форми
         */
        $form = new Varien_Data_Form();

        $form->setHtmlIdPrefix('main_'); // у всіх дітей форми (інпутів селектів, філдсетів, ...) є айдішка. То до цієї айдішки додасться цей префікс

        $fieldset = $form->addFieldset('base_fieldset',
            array('legend' => Mage::helper('siteblocks')->__('General Information'),
                  'class' => 'fieldset-wide')); // У цьому філдсеті будуть знаходитись дыти формм - http://joxi.ru/eAOz1oKix1oNx2

        if ($model->getBlockId()) {
            $fieldset->addField('block_id', 'hidden', array(
                'name' => 'block_id', // block_id1 - це прімарі кей моєї таблиці. Це я додаю схований інпут, щоб екшн на який я буду відправляти форму знав який рядок в базі йому редагувати
            ));
        }

        $fieldset->addField('title', 'text', array( // бе буде інпут з айдішкою  title і неймом title
            'name' => 'title',
            'label' => Mage::helper('siteblocks')->__('Block Title'),
            'title' => Mage::helper('siteblocks')->__('Block Title'),
            'required' => true,
        ));

        /**
         * #1й способ добавления рендерера или редекларации рендера для определенного типа полей
         * #соответсвтенно нам нужно создать класс по пути .../Block/Adminhtml/Siteblocks/Edit/Renderer/Myimage.php
         */
        $fieldset->addType('myimage', 'IGN_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Renderer_Myimage');

        /**
         * #если не пользоваться первым вариантом указания соответсвия типа-класс,
         *
         * то нужно создать файл lib/Varien/Data/Form/Element/Myimage.php
         */
        $fieldset->addField('image', 'myimage', array(
            'name' => 'image',
            'label' => Mage::helper('siteblocks')->__('Image'),
            'title' => Mage::helper('siteblocks')->__('Image'),
            'required' => true,
        ));

        $fieldset->addField('block_status', 'select', array(
            'label' => Mage::helper('siteblocks')->__('Status'),
            'title' => Mage::helper('siteblocks')->__('Status'),
            'name' => 'block_status',
            'required' => true,
            'options' => Mage::getModel('siteblocks/source_status')->toArray(), // Як бачу у мене і у гріді і у цій формі дані тягнуться з одного істочника. Це хороша практика
        ));

        // $fieldset->addField('content', 'textarea', array( - це звичайний текстарія. Внизу я написав візівік
        //     'name'      => 'content',
        //     'label'     => Mage::helper('siteblocks')->__('Content'),
        //     'title'     => Mage::helper('siteblocks')->__('Content'),
        //     'style'     => 'height:36em',
        //     'required'  => true,
        // ));

        /**
         * Це + protected function _prepareLayout() достатньо щоб візівік відобразився
         *
         * Інфа з бази теж підтянеться. Але функціонал у ньому не буде працювати. Не хватає ще js i css
         *
         * Добавити їх можна з блоків у яких він вже є. Я добавлю стандартний.
         *
         * Добавляти їх треба у лейаут. Адмін пейджа теж будується через лейаути
         *
         * http://magento.on/index.php/admin/siteblocks/edit/block_id/6/key/3a9e01d797b57a588d37f09b3fa47570/
         *
         * Отже ці js i css мені треба добавити у <admin_siteblocks_edit> - Я створив файл - app/design/adminhtml/default/default/layout/siteblocks.xml
         */
        $fieldset->addField('content', 'editor', array(
            'name' => 'content',
            'label' => Mage::helper('cms')->__('Content'),
            'title' => Mage::helper('cms')->__('Content'),
            'style' => 'height:36em',
            'required' => true,
            'config' => Mage::getSingleton('cms/wysiwyg_config')->getConfig() // конфіги для візівіка
        ));


        /**
         * Заповнити дані форми. Тобто коли я приходжу на сторінку редагування рядка таблиці, текущі дані з таблиці уже у формі.
         * Якщо після збереження даних була помилка, філди форми всерівно будуть заповнені із за того шо у змінну $model
         * попали дані з регістру $model = Mage::registry('siteblocks_block'); А у регістр я бодав ці дані у екшні saveAction()
         *
         */

        $form->setValues($model->getData()); //
        //$form->setUseContainer(true); // хз нашо
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