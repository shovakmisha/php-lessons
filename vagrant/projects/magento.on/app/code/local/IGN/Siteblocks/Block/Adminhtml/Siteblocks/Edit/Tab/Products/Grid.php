<?php

/**
 * Це майже повна копія дефолтного файла гріда апселів /Mage/Adminhtml/Block/Catalog/Product/Edit/Tab/Upsell.php
 *
 * Там де я щось змінював будуть коменти на українській
 *
 * Єдине що тут працює логіка _getProduct()-Ю
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @author      Magento Core Team <core@magentocommerce.com>
 */
class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Edit_Tab_Products_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    /**
     * мій текуший блок (рядок бази в адмінці)
     */
    protected $block;
    /**
     * Set grid params
     *
     */
    public function __construct()
    {

        parent::__construct();
        $this->setId('siteblocks_product_grid'); // довільна назва
        $this->setDefaultSort('entity_id'); // entity_id тому що це не моя таблиця гріда де айдішки block_id, це айдішки продуктів
        $this->setUseAjax(true);

        if ($this->_getBlock()->getId()) { // Було _getProduct()
            $this->setDefaultFilter(array('in_products'=>1)); // Цю колонку я створю в гріді (нижче в коді)
        }


        // думаю це не треба
        if ($this->isReadonly()) {
            $this->setFilterVisibility(false);
        }
    }

    /**
     * Було _getProduct()
     *
     * Це треба змінити. Так як цей метод підрозумівав взяття текущого продукта в адмінці
     *
     * А в мене тут немає продукта. В мене просто кастомний блок в адмінці
     *
     * Тепер в цьому файлі треба змінити _getProduct() на _getBlock()
     */
    protected function _getBlock()
    {
        if(!$this->block){

            /**
             * Витягне з моєї бази текуший рядок
             *
             * Я описував звідки в $this->getRequest()->getParam('block_id') є текущий рядок у файлі Products.php у методі getTabUrl()
             */
            $this->block = Mage::getModel('siteblocks/block')->load($this->getRequest()->getParam('block_id'));
        }
        return $this->block;
    }

    /**
     * Add filter
     *
     * Це для фільтрування вибраних продуктів в гріді вкладки Products
     *
     * Якщо видалити цей функціонал, то виведуться всі продукти. Я з цим кодом виведуться тільки ті у яких активний чербокс
     *
     * В принципі це дефолтний метод
     *
     * @param object $column
     * @return Mage_Adminhtml_Block_Catalog_Product_Edit_Tab_Upsell
     */

    protected function _addColumnFilterToCollection($column)
    {
        // Set custom filter for in product flag
        if ($column->getId() == 'in_products') {  // Цю колонку я створю в гріді (нижче в коді)
            $productIds = $this->_getSelectedProducts();
            if (empty($productIds)) {
                $productIds = 0;
            }
            if ($column->getFilter()->getValue()) {
                $this->getCollection()->addFieldToFilter('entity_id', array('in'=>$productIds));
            } else {
                if($productIds) {
                    $this->getCollection()->addFieldToFilter('entity_id', array('nin'=>$productIds));
                }
            }
        } else {
            parent::_addColumnFilterToCollection($column);
        }
        return $this;
    }

    /**
     * Checks when this block is readonly
     *
     * @return boolean
     */
    public function isReadonly()
    {
        return $this->_getBlock()->getUpsellReadonly(); // цей вираз повертає null. Не знаю нахер це
    }

    /**
     * Prepare collection
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    // було так
    //protected function _prepareCollection()
    //{
    //    $collection = Mage::getModel('catalog/product_link')->useUpSellLinks()
    //        ->getProductCollection()
    //        ->setProduct($this->_getProduct())
    //        ->addAttributeToSelect('*');
    //    if ($this->isReadonly()) {
    //        $productIds = $this->_getSelectedProducts();
    //        if (empty($productIds)) {
    //            $productIds = array(0);
    //        }
    //        $collection->addFieldToFilter('entity_id', array('in'=>$productIds));
    //    }
    //    $this->setCollection($collection);
    //    return parent::_prepareCollection();
    //}

    // стало так


    protected function _prepareCollection()
    {
#тут можем указать какую коллекцию используем для таблицы
        $collection = Mage::getResourceModel('catalog/product_collection')
            ->addAttributeToSelect('*');

        /**
         * Тут цей кондішн не пройде, так як isReadonly() поверне null, але з коду зрозуміло що у кондішні  if ($this->isReadonly()) { - є ще якась додаткова перевірка
         */
        if ($this->isReadonly()) {
            $productIds = $this->_getSelectedProducts();
            if (empty($productIds)) {
                $productIds = array(0);
            }
            $collection->addFieldToFilter('entity_id', array('in'=>$productIds));
        }

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     *
     * Таблиця гріда продуктів
     *
     * Add columns to grid
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareColumns()
    {
        if (!$this->_getBlock()->getUpsellReadonly()) {
            $this->addColumn('in_products', array( // http://joxi.ru/KAggGLzfEnaMWA
                'header_css_class' => 'a-center',
                'type'      => 'checkbox',
                'name'      => 'in_products',
                'values'    => $this->_getSelectedProducts(),
                'align'     => 'center',
                'index'     => 'entity_id'
            ));
        }

        $this->addColumn('entity_id', array(
            'header'    => Mage::helper('catalog')->__('ID'),
            'sortable'  => true,
            'width'     => 60,
            'index'     => 'entity_id'
        ));
        $this->addColumn('name', array(
            'header'    => Mage::helper('catalog')->__('Name'),
            'index'     => 'name'
        ));

        $this->addColumn('type', array(
            'header'    => Mage::helper('catalog')->__('Type'),
            'width'     => 100,
            'index'     => 'type_id',
            'type'      => 'options',
            'options'   => Mage::getSingleton('catalog/product_type')->getOptionArray(),
        ));

        $sets = Mage::getResourceModel('eav/entity_attribute_set_collection')
            ->setEntityTypeFilter(Mage::getModel('catalog/product')->getResource()->getTypeId())
            ->load()
            ->toOptionHash();

        $this->addColumn('set_name', array(
            'header'    => Mage::helper('catalog')->__('Attrib. Set Name'),
            'width'     => 130,
            'index'     => 'attribute_set_id',
            'type'      => 'options',
            'options'   => $sets,
        ));

        $this->addColumn('status', array(
            'header'    => Mage::helper('catalog')->__('Status'),
            'width'     => 90,
            'index'     => 'status',
            'type'      => 'options',
            'options'   => Mage::getSingleton('catalog/product_status')->getOptionArray(),
        ));

        $this->addColumn('visibility', array(
            'header'    => Mage::helper('catalog')->__('Visibility'),
            'width'     => 90,
            'index'     => 'visibility',
            'type'      => 'options',
            'options'   => Mage::getSingleton('catalog/product_visibility')->getOptionArray(),
        ));

        $this->addColumn('sku', array(
            'header'    => Mage::helper('catalog')->__('SKU'),
            'width'     => 80,
            'index'     => 'sku'
        ));

        $this->addColumn('price', array(
            'header'        => Mage::helper('catalog')->__('Price'),
            'type'          => 'currency',
            'currency_code' => (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE),
            'index'         => 'price'
        ));

        $this->addColumn('position', array(
            'header'                    => Mage::helper('catalog')->__('Position'),
            'name'                      => 'position',
            'type'                      => 'number',
            'width'                     => 60,
            'validate_class'            => 'validate-number',
            'index'                     => 'position',
            'editable'                  => true,
            'filter_condition_callback' => array($this, '_addLinkModelFilterCallback') // не знаю чи це треба
        ));

        return parent::_prepareColumns();
    }

    /**
     * Rerieve grid URL
     *
     * @return string
     */
    public function getGridUrl()
    {
        // було так
        //  return $this->_getData('grid_url') ? $this->_getData('grid_url') : $this->getUrl('*/*/upsellGrid', array('_current'=>true));

        /**
         * productsgrid це екшн який я зробив у контролері. У лейауті я йоготеж створив
         */
        return $this->_getData('grid_url') ? $this->_getData('grid_url') : $this->getUrl('*/*/productsgrid', array('_current'=>true));
    }

    /**
     * Retrieve selected upsell products
     *
     * @return array
     */
    // // Це я скопіював з нативного файла
   // protected function _getSelectedProducts()
   // {
   //     $products = $this->getProductsUpsell();
   //     if (!is_array($products)) {
   //         $products = array_keys($this->getSelectedUpsellProducts());
   //     }
   //     return $products;
   // }

    // і замінив на своє

    /**
     * @return array
     * @throws Exception
     */
    protected function _getSelectedProducts()
    {
        return array_keys($this->getSelectedBlockProducts());
    }

    /**
     * Retrieve upsell products
     *
     * @return array
     */
    // Це я скопіював з нативного файла
    //public function getSelectedUpsellProducts()
    //{
    //    $products = array();
    //    foreach (Mage::registry('current_product')->getUpSellProducts() as $product) {
    //        $products[$product->getId()] = array('position' => $product->getPosition());
    //    }
    //    return $products;
    //}

    // і замінив на своє

    /**
     * @return array
     * @throws Exception
     */
    public function getSelectedBlockProducts()
    {
        $selected = $this->getRequest()->getParam('siteblocks_products');

        // var_dump('777');
        // die('11111111111');

        $products = array();
        foreach ($this->_getBlock()->getProducts() as $product => $position) {
            $products[$product] = array('position' => $position);
        }
        foreach ($selected as $product) {
            if(!isset($products[$product])) {
                $products[$product] = array('position'=>$product);
            }
        }
        return $products;
    }

}
