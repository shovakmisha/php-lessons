<?php
namespace Training\Shop\Controller\Index;

use Magento\Framework\App\Action\Context;
// use Training\Shop\Api\Config\ShopInterface;

class Index extends AbstractAction
{
    public function execute()
    {

        echo /*$this->urlHelper->getShopsUrl();*/ '<p>You Did It!</p>';

       $shops = $this->shopConfig->getShops();
       $html = '<ul>';
       foreach ( $shops as $shop ) {
           $html.= '<li>';
           $html.= '<a href="'. $this->urlHelper->getShopUrl($shop['code']) .'">'; // $this->_foxyHelper->getShopUrl($shop['code']);
           $html.= $shop['name'];
           $html.= '</a> ('.$shop['code'].')';
           $html.= '</li>';
       }
       $html.= '</ul>';
       $this->getResponse()->appendBody($html);
    }
}