<?php
namespace Hadil\Customers\Model;

use \Magento\Framework\Model\AbstractModel;

class Customer extends AbstractModel
{

    protected function _construct()
    {
        $this->_init('Hadil\Customers\Model\ResourceModel\Customer');
    }

}
