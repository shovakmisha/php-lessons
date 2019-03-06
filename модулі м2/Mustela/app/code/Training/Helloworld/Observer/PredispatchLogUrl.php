<?php

namespace Training\Helloworld\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;
//use Training\Helloworld\Api\Config\EchoShow;

/**
 * PredispatchLogUrl Observer
 */
class PredispatchLogUrl implements ObserverInterface
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    protected $inf;

    /**
     * @inheritDoc
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function execute(Observer $observer)
    {
        // TODO: Implement execute() method.
        $url = $observer->getEvent()->getRequest()->getPathInfo();

         echo $url;
         echo " Observer Predispatch Log Url Word Seccsesfull";
        $this->inf = $url;

        // $this->logger->debug('77777777'); не работає
    }

    /**
     * @return mixed
     */
    public function getInf()
    {
        return $this->inf;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->logger;
    }
}

?>