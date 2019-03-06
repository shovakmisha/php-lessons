<?php

/**
 * Class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Grid_Renderer_Image
 */
class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Grid_Renderer_Image
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    /**
     * @param Varien_Object $row - Це текущий рядок моєї таблиці
     *
     * Тобто IGN_Siteblocks_Model_Block - моделька, яка обробляє мою  таблицю. Це і є $row = Mage::getModel('siteblocks/block')->load($id (of table));
     *
     * @return string
     *
     * Саме цей метод відповідає за те що буде показуватись у гріді.
     *
     * Тобто якщо я напишу щоб він ретурнив 'test', у всіх буде test - http://joxi.ru/KAxB9qwcMz5yDm
     */
    public function render(Varien_Object $row)
    {
        //return 'test';

        if( ! $row->getImage()) {
            return 'This item have no image';
        }
        $url = Mage::getBaseUrl('media') . 'siteblocks' .DS .$row->getImage();
        $html = "<img src='$url' width='50' height='auto'>";
        return $html; // в гріді відрендериться цей $html
    }
}
