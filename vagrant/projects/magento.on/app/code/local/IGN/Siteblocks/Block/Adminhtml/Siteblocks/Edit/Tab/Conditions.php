<?php

class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Tab_Conditions
        extends Mage_Adminhtml_Block_Widget_Form
        implements Mage_Adminhtml_Block_Widget_Tab_Interface
{

#методы, которые требует интерфейс
    public function getTabTitle()
    {
        return $this->__('Conditions');
    }

    public function getTabLabel()
    {
        return $this->__('Conditions');
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }

    /**
     * Init form
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId('conditions_form'); // довільна назва
        $this->setTitle(Mage::helper('siteblocks')->__('Block Conditions'));
    }

    protected function _prepareForm()
    {
        $model = Mage::registry('siteblocks_block');

        /**
         * Цей кусок форми вставиться в форму з файла Form.php Скоріш за все тому що у тому файлі є строчка $form->setUseContainer(true);
         *
         * І по цій строчці і оприділяється щ це контейнер форми
         */
         $form = new Varien_Data_Form();


        // Я мыняв цей префікс, але працювало завжди. Цей префікс не вліяв на функціонал
        $form->setHtmlIdPrefix('block_');

        #все для добавления условий
        /**
         * Після цього у неї буде функціонал кондішнів. Мабуть можна будь який функціонал добавляти таким чином
         *
         * Хоча може й ні. Суть у тому що я копіюю цей функціонал з маджентівської сторінки з кондішнами. Вона побудована по цій самій структурі що і я роблю
         *
         * Тобто так само як і в мене, Екшн у цієї сторінки - editAction(), у ньому створюється блок у який загружається така форма як і ця моя у якій я пишу тепер цей текст
         *
         * Тож я зайшов у цей editAction() і подивив чи є там якиїсь код, який щось робить щоб кондігни на його сторінці працювали.
         *
         * Єдине що було не звичайне - це ця строчка, я її і скопіював.
         */
        $model->getConditions()->setJsFormObject('block_conditions_fieldset');

        /**
         * Спочатку треба установити звідки будуть братись блок кондішнів.
         *
         * Після цього у змінній $renderer будуть дані з з кондішнами
         */
        $renderer = Mage::getBlockSingleton('adminhtml/widget_form_renderer_fieldset')// беру блок app/code/core/Mage/Adminhtml/Block/Widget/Form/Renderer/Fieldset.php
        ->setTemplate('promo/fieldset.phtml')// назначаю йому темплейт
        /**
         * На цей юрл будуть даватись аякс запити щоб витягнути які є кондішни
         *
         * Це дефолтний контролер. Якщо шо, можна реалізувати свій кастомний
         *
         *
         */
        ->setNewChildUrl($this->getUrl('*/promo_catalog/newConditionHtml/form/block_conditions_fieldset')); // Екшн newConditionHtml() знаходиться тут /app/code/core/Mage/Adminhtml/controllers/Promo/CatalogController.php  form/block_conditions_fieldset це параметри які я передам методу екшна

        /**
         * Додати новий філдсет
         *
         * Але цей екшн не виконається тепер. На даний момент це просто додасться змінна new_child_url - http://joxi.ru/LmG9DozueQBbLA
         */
        $conditionsFieldset = $form->addFieldset('conditions_fieldset',
            array(
                'legend' => Mage::helper('siteblocks')->__('Conditions'), //  заголовок філдсета - http://joxi.ru/Y2Lz0oWi9ywdRr
                'class' => 'fieldset-wide') // клас філдсета
        )->setRenderer($renderer);

        $conditionsFieldset->addField('conditions', 'text', array(
            'name' => 'conditions',
            'label' => Mage::helper('siteblocks')->__('Conditions'),
            'title' => Mage::helper('siteblocks')->__('Conditions'),
            'required' => true,
        ))->setRule($model)->setRenderer(Mage::getBlockSingleton('rule/conditions'));


        $form->setValues($model->getData()); //
        // $form->setUseContainer(true); // http://joxi.ru/E2pEgxwu9npaQA - хз нашо
         $this->setForm($form);

        return parent::_prepareForm();


    }

}
