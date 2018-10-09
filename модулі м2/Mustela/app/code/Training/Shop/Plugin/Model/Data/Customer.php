<?php

namespace Training\Shop\Plugin\Model\Data;

use Training\Shop\Api\Config\ShopInterface;

class Customer
{

    protected $shopConfig;

    public function __construct(
        ShopInterface $shopConfig
    )
    {
        $this->shopConfig = $shopConfig;
    }

    /**
     * @param $subject
     * @param $value
     */
    public function beforeSetFirstname($subject, $value){
        $shop = $this->shopConfig->getShop($value);
        if($shop) {
            $value = $shop['code'] . " (" . $shop['name'] . ") хаха";
        }
        return [$value];
    }
}
