<?php
/**
 * Training Helloworld Product\Index controller AbstractAction class
 *
 * @category Training
 * @package Training_Helloworld
 * @author Myhkaylo Shovak <mysho@smile.fr>
 * @copyright 2018 Smile
 *
 * Також я написав тут варіант, як це можна зробити через ObjectManage. Він закоментований у слеші з зірочками
 *
 */

namespace Training\Helloworld\Controller\Product;

use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;

class Index extends Action
{
    /**
     * @var \Magento\Catalog\Model\ProductFactory
     */
    protected $productFactory;

    // protected $objectManager;

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var PageFactory
     */
    protected $pageFactory;

    /**
     * Index constructor.
     * @param Context $context
     * @param ProductFactory $productFactory
     * @param Registry $registry
     * @param PageFactory $pageFactory
     */
    public function __construct(
        // \Magento\Framework\ObjectManagerInterface $objectManager,
        Context $context,
        ProductFactory $productFactory,
        Registry $registry,
        PageFactory $pageFactory
    ) {
        // $this->objectManager = $objectManager;

        parent::__construct($context);
        $this->registry = $registry;
        $this->pageFactory = $pageFactory;
        $this->productFactory = $productFactory;
    }

    public function execute()
    {
        $product = $this->_getAskedProduct();
        if(!$product) {
            $this->_forward('noroute');
            return;
        }
         // $this->getResponse()->appendBody(555);

        // $this->getResponse()->appendBody($product->getName());

         $this->registry->register('current_product', $product);
         $resultPage = $this->pageFactory->create();
         $resultPage->getConfig()->getTitle()->set("Name: " . $product->getName());

        return $resultPage;
    }

    protected function _getAskedProduct() { // Банально, але цей метод дуже класно показує правильність написання коду. По назві цього метода понятно що він робить. І крім цього нічого, щоб не робити спагетті
        $id = (int)$this->getRequest()->getParam('id'); // витягую айдішку продукта з адресної строки

        if (!$id) {
            return null;
        }
        $product = $this->objectManager->create('\Magento\Catalog\Model\Product')->load($id); // створюю обєкт продукта, загружаю його по айді і присвоюю.
        // Я не впевнений, але мены здається що \Magento\Catalog\Model\Product наслідується від  \Magento\Framework\ObjectManagerInterface
        // Типу правильно робити це через фабрику продукта, а тут я взяв просто модель продукта
        // Суть у тому що я створив обєкт з Magento\Catalog\Model\Product і у ньго є метод load, який прийшов по наслідству

        $product = $this->productFactory->create()->load($id);
        if (!$product->getId()) {
            return null;
        }
        return $product;
    }
}