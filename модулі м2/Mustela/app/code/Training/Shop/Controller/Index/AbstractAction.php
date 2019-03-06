<?php
/**
 * Training Shop Index\Index controller AbstractAction class
 *
 * @category Training
 * @package Training_Shop
 * @author Myhkaylo Shovak
 * @copyright 2016 Smile
 */
namespace Training\Shop\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Training\Shop\Api\Config\ShopInterface;
use Training\Shop\Helper\UrlHelper;

abstract class AbstractAction extends Action
{
    /**
     * @var \Training\Shop\Api\Config\ShopInterface
     */
    protected $shopConfig;

    protected $urlHelper;


    public function __construct(
        Context $context,
        ShopInterface $shopConfig, // У di.xml я переоприділив, що якщо запрашується інтерфейс ShopInterface.php, то цн буде клас
        UrlHelper $urlHelper
    ) {
        $this->shopConfig = $shopConfig;
        $this->urlHelper = $urlHelper;
        parent::__construct($context);
    }
}
