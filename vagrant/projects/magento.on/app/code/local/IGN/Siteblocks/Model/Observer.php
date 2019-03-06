<?php

/**
 * Class IGN_Siteblocks_Model_Observer
 */
class IGN_Siteblocks_Model_Observer {
    /**
     * @param $bserver Varien_Event_Observer - У мого обсервера будуть методи цього класа
     *
     * Mage::dispatchEvent('checkout_cart_product_add_after', array('quote_item' => $result, 'product' => $product));
     *
     * Разом з івентом передались параметри з якими можна працювати
     */

//Да это не camelCase стиль именования. Моя привычка: название события = название метода
//Но можно назвать метод как угодно, например: checkoutCartProductAddAfter
    public function checkout_cart_product_add_after($observer)
    {
        // var_dump($observer->getEvent()->getData('quote_item')->getData());die;
    }
}