<?php
namespace Training\Helloworld\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

//use Magento\Framework\Event\Observer;
//use Magento\Framework\Event\ObserverInterface;
//use Psr\Log\LoggerInterface;

//use Training\Helloworld\Api\Config\EchoShow;

class Index extends Action
{

    protected $pageFactory;
    //protected $predispatch;
//
    public function __construct(
        Context $context,
        PageFactory $pageFactory //,
       // EchoShow $predispatch
    ) {

        //$this->predispatch = $predispatch;
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }



    public function execute()
    {

        //echo '<p>You Did It!</p>';
        // var_dump(__METHOD__);

        //echo $this->predispatch->getInf();

         // $this->getResponse()->appendBody('Hello');

        $resultPage = $this->pageFactory->create();
        return $resultPage;

    }
}