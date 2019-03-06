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

#в этом методе мы можем добавлять вкладки. еще их можно добавлять в макете(лейауті. Яйого теж зробив)
    protected function _prepareLayout()
    {
        $this->addTab('main_tab',array( // main_tab - довільна назва
            'label' => $this->__('Main'),
            'title' => $this->__('Main'),
            'content' => $this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks_edit_tab_main')->toHtml() // У цей блок я скопіював форму що робив на попередніх уроках
        ));

        /*$this->addTab('conditions_tab',array(
             'label' => $this->__('Conditions'),
             'title' => $this->__('Conditions'),
             'content' => $this->getLayout()->createBlock('siteblocks/adminhtml_siteblocks_edit_tab_conditions')->toHtml()
         ));*/

        $this->addTab('conditions_tab','siteblocks/adminhtml_siteblocks_edit_tab_conditions');

        return parent::_prepareLayout();
    }
}