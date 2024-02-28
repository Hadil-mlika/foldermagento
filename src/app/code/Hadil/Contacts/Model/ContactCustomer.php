<?php

namespace Hadil\Contacts\Model;

use Magento\Framework\Model\AbstractModel;

class ContactCustomer extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('\Hadil\Contacts\Model\ResourceModel\ContactCustomer::class');
    }
}
