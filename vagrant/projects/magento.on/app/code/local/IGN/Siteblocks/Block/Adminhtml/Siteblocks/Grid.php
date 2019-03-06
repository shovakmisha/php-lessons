<?php

class IGN_Siteblocks_Block_Adminhtml_Siteblocks_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('cmsBlockGrid');
        $this->setDefaultSort('block_identifier');
        $this->setDefaultDir('ASC');
    }

    protected function _prepareCollection() // підключаюсь до таблиці яка буде у гріді
    {
        $collection = Mage::getModel('siteblocks/block')->getCollection();
        /* @var $collection Mage_Cms_Model_Mysql4_Block_Collection */
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() // - Тут я буду описувати які колонки з таблиці я буду мати у адмінці
    {

        $this->addColumn('title', array(
            'header'    => Mage::helper('siteblocks')->__('Title 1'),
            'align'     => 'left',
            'index'     => 'title',
        ));

        // Це звичайна картинка. Не перероблена. Мабуть можна кастомізувати її вказавши їй інший рендер як для картинки у формі. Але цей чувак не робив цього
        $this->addColumn('image', array(
            'header'     => Mage::helper('siteblocks')->__('Image'),
            'index'      => 'image', // після цього дані картинки підтянуться з бази, з колонки image. Але це підтянеться прям те що в базі. Тобто імя картинки
            'renderer'   => 'IGN_Siteblocks_Block_Adminhtml_Siteblocks_Grid_Renderer_Image', // Щоб у гріді показувалось не імя картинки, а показувалась картинка, треба указати клас, який це буде рендерити. Я зробив свій клас, але можна використати стандартні. Вони знаходяться у app/code/core/Mage/Adminhtml/Block/Widget/Grid/Column/Renderer/ Я взяв звідти Text.php і на основі нього зробив свій
            //         'renderer'  => 'siteblocks/adminhtml_siteblocks_grid_renderer_image' #альтернативный способ
            'filter' => false, // Картинки мы не сможем фильтровать
            'sortable'   => false // и не сможем их сортировать
    ));

        $this->addColumn('block_status', array(
            'header'    => Mage::helper('cms')->__('Status'),
            'align'     => 'left',
            'type'      => 'options', // Після цього над колонкою зявиться дропдаун по якому можна буде сортувати колонку. воно працює в звязці з 'options'. Тобто це по суті виборка, як стори наприклад. Є колонка сторів і над ним селект. Вибираю англійський стор і покажуться тільки англійські стори
            'options'   => Mage::getModel('siteblocks/source_status')->toArray(), // http://joxi.ru/D2PzQoZipDXzDr - це тип селект, якому я передав масив з опшинами з бази. Можна запутитись з toArray i toOptionArray() методами, але вони по різному виводять інфу і для різних цілей.
            'index'     => 'block_status'
        ));

        $this->addColumn('created_at', array(
            'header'    => Mage::helper('siteblocks')->__('Created At'),
            'index'     => 'created_at',
            'type'      => 'date', // це буде поле дати. Тобто type - це спосіб фільтрування (селектом, інпутом, чекбоксом, датою, ....)

        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('block_id'); // хз чому так
        $this->getMassactionBlock()->setIdFieldName('block_id'); // хз чому так
        $this->getMassactionBlock()
            ->addItem('delete',
                array(
                    'label' => Mage::helper('siteblocks')->__('Delete'),
                    'url' => $this->getUrl('*/*/massDelete'), // massDeleteAction() буде його оброблювати
                    'confirm' => Mage::helper('siteblocks')->__('Are you sure?')
                )
            )
            ->addItem('status',
                array(
                    'label' => Mage::helper('siteblocks')->__('Update status'),
                    'url' => $this->getUrl('*/*/massStatus'),
                    'additional' => // http://joxi.ru/ZrJzyo5i9VOEjr - це додаткове вікно зявиться
                        array('block_status'=>
                            array(
                                'name' => 'block_status',
                                'type' => 'select',
                                'class' => 'required-entry',
                                'label' => Mage::helper('siteblocks')->__('Status'),
                                'values' => Mage::getModel('siteblocks/source_status')->toOptionArray()
                            )
                        )
                )
            );
        return $this;
    }

    /**
     * Row click url
     *
     * @return string
     *
     * Коли клацаю на рядок, це і є кнопка едіт. Після клацання мене відправить на сторінку редагування текущого рядка таблиці
     *
     * мене відправить на контролер http://magento.on/index.php/admin/siteblocks/edit де я буду пеперівяти - якщо у медіаквері є айдішка рядка таблиці, який я буду міняти, то це я буду апдейтити рядок. якщо айдішки не має (block_id), то це я буду створювати новий рядок
     */
    public function getRowUrl($row) // Я не знаю як це працює але $row це рядок гріда. Тобто це я ставлю юрл кожному рядку.
    {
        return $this->getUrl('*/*/edit', array('block_id' => $row->getId())); //  після цього лінка у рядка буде на редагування текущого рядка + медіаквері айдішки рядка таблиці
    }

}