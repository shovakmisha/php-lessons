<?php
namespace Training\Shop\Controller\Index;

class View extends AbstractAction
{

    public function execute()
    {

        // get the asked code
        $shopCode = $this->getRequest()->getParam('code');

        if(!$shopCode) {
            $this->_forward('myroute');
            return;
        }

        // get the shop

        $shop = $this->shopConfig->getShop($shopCode);

        if(!$shop) {
            $this->_forward('noroute');
            return;
        }

        $html = '<ul>';
        foreach ($shop as $key => $value) {
            $html.= '<li>'.$key.': '.$value.'</li>';
        }
        $html.= '</ul>';
        $html.= '<a href="'. $this->urlHelper->getShopsUrl() .'">Return to she list</a>';
        $this->getResponse()->appendBody($html);

    }
}