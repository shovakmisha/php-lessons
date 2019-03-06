<?php

namespace Training\Shop\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

/**
 * Class Router
 * @package Training\Shop\Controller
 */
class Router implements RouterInterface
{
    /**
     * @var ActionFactory
     */
    protected $actionFactory;

    /**
     * Router constructor.
     * @param ActionFactory $actionFactory
     */
    public function __construct(ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }

    /**
     * @param RequestInterface $request
     */
    public function match(RequestInterface $request)
    {
        $info = $request->getPathInfo();

        if( preg_match("%^/shop/(.*?)\.html$%", $info, $m) )
        {
            if($m[1] === 'list') {
                $request->setPathInfo("/shop/index/index");
            } else {
                $request->setPathInfo(sprintf("/shop/index/view/code/%s", $m[1]));
            }

            return $this->actionFactory->create(
                'Magento\Framework\App\Action\Forward'
            );
        }

        return null;
    }
}