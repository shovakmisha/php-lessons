<?php

namespace Test\UiGrid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Grid extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('uigrid', 'entity_id');
    }
}