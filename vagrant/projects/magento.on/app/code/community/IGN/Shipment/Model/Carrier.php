<?php
class IGN_Shipment_Model_Carrier extends Mage_Shipping_Model_Carrier_Abstract implements Mage_Shipping_Model_Carrier_Interface {

    /**
     * Думаю принцип цієї змінної такий самий як і в пеймент методі. Я описував там як задіяна ця змінна
     * @var string
     */
    protected $_code = 'ignshipment';

    /**
     * Це переписаний метод.
     *
     * Тут буде рахуватись стоимость доставки. Які методи доставки доступні
     *
     * В цьому випадку ціна доставки буде залежати від ваги
     *
     * В конфігах я описав packet_max_weight і в адмінці задав це знаення.
     *
     * І тут перевіряю, якщо вага товару менше як це значення, то все ок
     *
     * @param Mage_Shipping_Model_Rate_Request $request
     * @return bool|Mage_Shipping_Model_Rate_Result|null
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        /**
         * @var Mage_Shipping_Model_Rate_Result $result
         *
         * Тут по ходу храниться дані корзини
         */
        $result = Mage::getModel('shipping/rate_result');

        // вага товарів в корзині
        $weight = $request->getPackageWeight();

        /**
         * @var Mage_Shipping_Model_Rate_Result_Method $method
         *
         * Це буде моделька мого текущого шипінг метода. Тобто мого шипінг метода.
         *
         * Тут будуть вже налаштування що є в нього в адмінці
         */
        $method = Mage::getModel('shipping/rate_result_method'); // http://joxi.ru/a2XzQokiwyNg3r

        $method->setCarrier($this->_code);

        // задаю йому тайтл
        $method->setCarrierTitle($this->getConfigData('title'));

        $xxx = $this->getConfigData('packet_max_weight');

        /**
         * В зависимости от общего веса узнаем стоимость у соответствующего способа доставки
         */
        if($weight > $this->getConfigData('packet_max_weight')) { // витягне packet_max_weight що я йому прописав
            $this->_getBoxMethod($weight,$method);
        } else {
            $this->_getPacketMethod($weight,$method);
        }

        // тобто якби в мене було декіька способів доставки, я б їх тут апендив у цьому місці і вони виведуться на фронті
        $result->append($method);

        return $result;
    }

    protected function _getPacketMethod($weight,$method)
    {
        /**
         * Я так іне поняв що це за setMethod(). По суті він нічого не робить. Можливо це якиїсь додатковий функціонал
         */
        $method->setMethod('packet');
        $method->setMethodTitle('Packet belpost'); // трохи хардкоду. В принципі тайтл можнавитягнути з getAllowedMethods()

        // витягую ціну
        $sum = Mage::helper('ignshipment')->getPacketCost($weight);
        $method->setPrice($sum);
    }

    protected function _getBoxMethod($weight,$method)
    {
        /**
         * Я так іне поняв що це за setMethod(). По суті він нічого не робить. Можливо це якиїсь додатковий функціонал
         */
        $method->setMethod('box');
        $method->setMethodTitle('Box belpost');

        // витягую ціну
        $sum = Mage::helper('ignshipment')->getBoxCost($weight);
        $method->setPrice($sum);
    }

    /**
     * Мы не будем реализовывать отслеживание по проблеме отсутствия API
     */
    public function isTrackingAvailable()
    {
        return false;
    }

    /**
     * по задумке у нас 2 способа доставки. Пакет до 2000 граммов, и посылка
     */
    public function getAllowedMethods()
    {
        return array(
            'packet' => 'Packet belpost',
            'box'  => 'Box belpost'
        );
    }

}