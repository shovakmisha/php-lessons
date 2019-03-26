<?php
class IGN_Siteblocks_Block_List extends Mage_Core_Block_Template {

    /**
     * Виберуться з бази тільки рядки у яких статус енейбл і у яких кондішн(якщо він є), підходить
     * @return mixed
     */
    public function getBlocks()
    {
        //return Mage::getResourceModel('siteblocks/block_collection');
        $items = Mage::getModel('siteblocks/block')->getCollection()
            ->addFieldToFilter('block_status',array('eq'=>IGN_Siteblocks_Model_Source_Status::ENABLED));

        // $xxx = Mage::registry('current_product');
        // echo 555;

        $filterItems = $items;

        /**
         * Якщо цей код буде виконуватись на сторінці продукту
         *
         * Хз чому, але Mage::registry('current_product') це текущий продукт продукт пейджі
         *
         */
        if( Mage::registry('current_product') instanceof Mage_Catalog_Model_Product)
        {
            $filterItems = array();
            /**
             *
             *  $item - це рядок гріда. Якщо в нього є якиїсь кондішн, то тут я буду перевіряти методом validate
             */
            foreach ($items as $item) {
                /**
                 * Умовно в мене є 4 рядки в гріді. Один статус disable, залишаэться 3
                 *
                 * у 2-х, є кондішни, які не підходять. а у одгого немає кондішна. Тоді у $filterItems попаде тыльки 1 рядок
                 */
                if( $item->validate(Mage::registry('current_product')) ) {
                    $filterItems[] = $item;
                }
            }
        }

        return $filterItems;

    }



    public function test()
    {
        return '77777';
    }

    /**
     * Вивожу дані віджета з гріда. Це віджет виведеться з продуктом
     * @param $block
     * @return mixed
     */
    public function getBlockContent($block)
    {
        $processor = Mage::helper('cms')->getBlockTemplateProcessor();
        $html = $processor->filter($block->getContent());
        return $html;
    }

    public function getImageSrc()
    {
        return Mage::getBaseUrl('media'). 'siteblocks' . DS . $this->getImage();
    }

    //этот метод используем для вывода товаров
    public function getProductsList($block)
    {
        $products = $block->getProducts();
        asort($products);
        $collection = Mage::getResourceModel('catalog/product_collection')
            ->addFieldToFilter('entity_id',array('in'=>array_keys($products)))
            ->addAttributeToSelect('*');

        /** @var Mage_Catalog_Block_Product_List $list */
        $list = $this->getLayout()->createBlock('catalog/product_list');
        $list->setCollection($collection);
        $list->setTemplate('siteblocks/product/list.phtml');
        return $list->toHtml();
    }


}