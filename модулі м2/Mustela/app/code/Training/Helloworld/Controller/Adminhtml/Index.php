<?php

namespace Training\Helloworld\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\HTTP\PhpEnvironment\Response;

/**
 * Class Index
 * @package Training\Helloworld\Controller\Adminhtml\Index
 *
 * @method Response getResponse
 */
class Index extends Action
{
    /**
     *
     */
    const ADMIN_RESOURCE = 'Training_Helloworld::hello_world';

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        $this->getResponse()->appendBody('Hello Admin World');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(static::ADMIN_RESOURCE);
    }
}