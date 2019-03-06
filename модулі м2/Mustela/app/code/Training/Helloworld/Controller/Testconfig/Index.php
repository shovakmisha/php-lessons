<?php
namespace Training\Helloworld\Controller\Testconfig;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

//use Magento\Framework\Event\Observer;
//use Magento\Framework\Event\ObserverInterface;
//use Psr\Log\LoggerInterface;

use Training\Shop\Api\Config\ShopInterface;

class Index extends Action implements ShopInterface
{

    protected $pageFactory;

    /**
     * @var \Training\Shop\Api\Config\ShopInterface
     */
    protected $shopConfig;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        ShopInterface $shopConfig
    ) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->shopConfig = $shopConfig;
    }

    public function getShops()
    {
        return $this->shopConfig->getShops();
    }

    public function getShop($code)
    {
        return $this->shopConfig->getShop($code);
    }

    public function execute()
    {

        echo '<p></p>';

        $this->getResponse()->appendBody('Hello');

        echo '<br>';

        $shops = $this->shopConfig->getShops();

        foreach ( $shops as $shop ) {
            $this->getResponse()->appendBody('Hello');
        }


        // $resultPage = $this->pageFactory->create();
        // return $resultPage;

    }
}