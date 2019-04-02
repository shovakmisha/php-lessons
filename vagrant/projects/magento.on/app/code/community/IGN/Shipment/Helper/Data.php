<?php
class IGN_Shipment_Helper_Data extends Mage_Core_Helper_Abstract {


    public function getPacketCost($weight)
    {
        // Як бачу, можна використовувати і зендовський клас, не тільки маджентівський для роботи з апішкою
        $request = new Zend_Http_Client();
        $request->setUri('http://tarifikator.belpost.by/forms/international/packet.php');
        $request->setParameterPost(array(
            'who'=>'ur',
            'type'=>'registered',
            'priority'=>'priority',
            'to'=>'other',
            'weight'=>$weight
        ));
        $response = $request->request(Zend_Http_Client::POST);

        $html = $response->getBody();

        $tag_regex = "/<blockquote>(.*)<\/blockquote>/im";
        $sum_reqex = "/(\d+)/is";

        /**
         *
         * Возможно у вас есть вопросы к моим регуляркам. У меня тоже есть к ним вопросы, но оставим это по принципу «работает — не трогай».
         *
         */
        preg_match_all($tag_regex, // Кароче ця регулярка поверне ціну зі хтмл сторінки яка храниться строкою
            $html,
            $matches,
            PREG_PATTERN_ORDER);
        if(isset($matches[1]) && isset($matches[1][0])) {
            preg_match($sum_reqex,$matches[1][0],$matches);
            if(isset($matches[0])) {
                return (float)$matches[0];
            }
        }
        //делаем вывод стандартной цены, если не удалось узнать на сайте
        //а можно вернуть ошибку и сделать метод недоступным для использования
        return Mage::getStoreConfig('carriers/ignshipment/price');
    }

    public function getBoxCost($weight)
    {
        $request = new Zend_Http_Client();
        $request->setUri('http://tarifikator.belpost.by/forms/international/ems.php');
        $request->setParameterPost(array(
            'who'=>'ur',
            'type'=>'goods',
            'to'=>'n10', //тут простая затычка. нужно создавать ассоциативный массив таких кодов с сайта и кодов страны, т.к. в Magento это US, NZ, AU, а на белпочте это n1,n2,n3 и тд.
            'weight'=>$weight
        ));
        $response = $request->request(Zend_Http_Client::POST);

        $html = $response->getBody();

        $tag_regex = "/<blockquote>(.*)<\/blockquote>/im";
        $sum_reqex = "/(\d+)/is";
        preg_match_all($tag_regex,
            $html,
            $matches,
            PREG_PATTERN_ORDER);
        if(isset($matches[1]) && isset($matches[1][0])) {
            preg_match($sum_reqex,$matches[1][0],$matches);
            if(isset($matches[0])) {
                return $matches[0];
            }
        }
        //делаем вывод стандартной цены, если не удалось узнать на сайте
        //а можно вернуть ошибку и сделать метод недоступным для использования
        return Mage::getStoreConfig('carriers/ignshipment/price');
    }
}