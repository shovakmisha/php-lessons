<?php
/**
 * @author Slava Yurthev
 */
namespace Training\Shop\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\UrlInterface;

class UrlHelper // extends \Magento\Framework\App\Helper\AbstractHelper; і без цього працює
{

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Url constructor.
     * @param UrlInterface $urlBuilder
     */
    public function __construct(UrlInterface $urlBuilder)
    {
        $this->urlBuilder = $urlBuilder;
    }


    public function getShopsUrl() {
        return $this->urlBuilder->getUrl('shop');
    }

    /**
     * @param $code
     */
    public function getShopUrl($code) {
        return $this->urlBuilder->getUrl('shop/index/view', ['code' => $code]);
    }

    public function upperString($string)
    {
        return strtoupper($string);
    }

}
?>