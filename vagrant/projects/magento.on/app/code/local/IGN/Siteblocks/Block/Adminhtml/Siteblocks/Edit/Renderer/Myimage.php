<?php

class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Renderer_Myimage extends Varien_Data_Form_Element_Abstract
{
    /**
     * Constructor
     *
     * @param array $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
        $this->setType('file');
    }

    /**
     * Return element html code
     *
     * Це я скопіював метод з дефолтної мадженти - lib/Varien/Data/Form/Element/Image.php
     *
     * Тобто маджента так само виводить елементи
     *
     * це вже конечний скріпт. тТобто якщо цей метод поверне якусь строку то ця строка покажеться в адмінці
     *
     * але це тільки для картинки. Інпут шо вибираэ картинки виводить ынший рендер
     *
     * @return string
     */
    public function getElementHtml()
    {
        $html = '';

        if ((string)$this->getValue()) {
            $url = $this->_getUrl();

            /**
             *
             * У контролері saveAction() є метод $this->_uploadFile('image', $block); який аплоадить картинки на сайт
             *
             * У ньому я вказав шлях, куди будуть зберігатись картинки Mage::getBaseDir('media') . DS . 'siteblocks' . DS;
             *
             * Маджента з картинками работає так що у базі буде хранитись імя картинки а шлях до них кожен по своєму будує
             *
             * За замовчкванням картинки зберігаються в media - http://magento.on/media/21371192_1427783250603177_6255620955491706320_n_1.jpg
             *
             * Тут я перероблю це щоб інпути картинок для типів які наслідуються від IGN_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Renderer_Myimage
             * будуть шкатись в media/siteblocks
             *
             */
            if( !preg_match("/^http\:\/\/|https\:\/\//", $url) ) {
                $url = Mage::getBaseUrl('media') . 'siteblocks' . DS . $url; // У контролері
            }

             $html = '<a href="' . $url . '"'
                 . ' onclick="imagePreview(\'' . $this->getHtmlId() . '_image\'); return false;">'
                 . '<img src="' . $url . '" id="' . $this->getHtmlId() . '_image" title="' . $this->getValue() . '"'
                 . ' alt="' . $this->getValue() . '" height="99" width="99" class="small-image-preview v-middle" />'
                 . '</a> ';

            /**
             * можна згенерувати свій темплейт для вивода картинки
             *
             * #закомментированный ниже код мы можем использовать для того, что бы html код строился в темплейте,
             * актуально при использовании сложных элементов
             *
             * Mage_Adminhtml_Block_Template - по ходу якиїсь стандартний блок для адмінських темплейтів
             */

            // $additional = Mage::app()->getLayout()->createBlock('Mage_Adminhtml_Block_Template'); // і такий синтаксис можна використовувати
            // $additional->setTemplate('siteblocks/image.phtml')
            //     ->setImageUrl($url);
            // $html = $additional->toHtml();

        }
        $this->setClass('input-file');
        $html .= parent::getElementHtml();
        $html .= $this->_getDeleteCheckbox(); // - добавить чекбокс 'видалити' біля картинки

        return $html;
    }

    /**
     * Return html code of delete checkbox element
     *
     * Цей метод виводить чекбокс для видалення картинки
     *
     * @return string
     */
    protected function _getDeleteCheckbox()
    {
        $html = '';
        if ($this->getValue()) {
            $label = Mage::helper('core')->__('Delete Image');
            $html .= '<span class="delete-image">';
            $html .= '<input type="checkbox"'
                . ' name="' . parent::getName() . '[delete]" value="1" class="checkbox"'
                . ' id="' . $this->getHtmlId() . '_delete"' . ($this->getDisabled() ? ' disabled="disabled"': '')
                . '/>';
            $html .= '<label for="' . $this->getHtmlId() . '_delete"'
                . ($this->getDisabled() ? ' class="disabled"' : '') . '> ' . $label . '</label>';
            $html .= $this->_getHiddenInput();
            $html .= '</span>';
        }

        return $html;
    }

    /**
     * Return html code of hidden element
     *
     * @return string
     */
    protected function _getHiddenInput()
    {
        return '<input type="hidden" name="' . parent::getName() . '[value]" value="' . $this->getValue() . '" />';
    }

    /**
     * Get image preview url
     *
     * @return string
     */
    protected function _getUrl()
    {
        return $this->getValue();
    }

    /**
     * Return name
     *
     * @return string
     */
    public function getName()
    {
        return  $this->getData('name');
    }
}
