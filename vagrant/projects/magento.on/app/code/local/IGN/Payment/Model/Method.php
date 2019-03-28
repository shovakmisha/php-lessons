<?php
class IGN_Payment_Model_Method extends Mage_Payment_Model_Method_Abstract {

//нельзя забывать указать код метода
    protected $_code = 'ignpayment';

//указываем block type. Тобто темплейти у яких буде виводити мій пеймент метод на фронт насторінку чекаута. Їх я скопіював з нативного пеймента
    protected $_formBlockType = 'ignpayment/form'; // app/code/local/IGN/Payment/Block/Form.php
    protected $_infoBlockType = 'ignpayment/info'; // app/code/local/IGN/Payment/Block/Info.php

//этот метод используется для валидации секретного кода, а так же любых интересующих нас параметров корзины
    public function validate()
    {
        // І знов він витягує гет параметри навіть коли він аяксом звертається
        $code = Mage::app()->getRequest()->getParam('secret_code');

        // Витягую значення secret_code з адмінки. З мого пеймент метода
        if($code != $this->getConfigData('secret_code')) {
            Mage::throwException(Mage::helper('ignpayment')->__("This code doesn't work!"));
        }
        return parent::validate();
    }

}