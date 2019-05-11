<?php

namespace Test\UiGrid\Model;

use Magento\Framework\Model\AbstractModel;
use Test\UiGrid\Model\ResourceModel\Grid;

class Grid extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(Grid::class);
    }
}