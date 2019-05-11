<?php

namespace Test\UiGrid\Model\ResourceModel\Grid;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Test\UiGrid\Model\Grid;
use Test\UiGrid\Model\ResourceModel\Grid as GridResource;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Grid::class, GridResource::class);
    }
}