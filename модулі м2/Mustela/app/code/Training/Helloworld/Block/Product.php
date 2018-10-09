<?php

namespace Training\Helloworld\Block;

use Magento\Framework\Registry;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Product extends Template
{

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * Product constructor.
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Registry $registry,
        array $data
    ) {
        $this->registry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * @return mixed
     */
    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }

}