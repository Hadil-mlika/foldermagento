<?php

namespace Hadil\Contacts\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class ContactCustomer extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('customer_contact', 'customer_id'); // Replace 'user_table' with your table name
    }
}
