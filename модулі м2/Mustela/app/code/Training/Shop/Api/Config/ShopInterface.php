<?php

namespace Training\Shop\Api\Config;

interface ShopInterface
{
    /**
     *  Get shop by code
     *
     * @param mixed $code Shop code
     *
     * @return array
     */
    public function getShop($code);

    /**
     * Get all shops
     *
     * @return array
    */
    public function getShops();
}

?>