<?php

namespace Training\Shop\Config;

class Shop
    extends \Magento\Framework\Config\Data // Чому саме він?
    implements \Training\Shop\Api\Config\ShopInterface
{
    public function __construct(
        \Training\Shop\Config\Shop\Reader $reader,
        \Magento\Framework\Config\CacheInterface $cache, // Конфіги будуть кешуватись
        $cacheId = 'Training\Shop_config' // Це шлях до конфігів які будуть обробляти схему?
    ) {
        parent::__construct($reader, $cache, $cacheId);
    }

   public function getShop($code)
   {
       // TODO: Implement getShop() method.
       return $this->get($code);
   }
   public function getShops()
   {
       // TODO: Implement getShops() method.

       // print_r($this->get());

       return $this->get(); // Що це повертає?
   }

}

    // $xxx = new Shop();
    // $xxx->getShops();
    // foreach ($xxx->getShops() as $key => $value) {
    //     echo 7;
    // }

?>