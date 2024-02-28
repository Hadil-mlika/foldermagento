<?php

namespace Hadil\Contacts\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Hadil\Contacts\Model\ResourceModel\Contact;

class Form extends Template
{

    protected $contactResource;
    public function __construct(Context $context,Contact $contactResource , array $data = [] )
    {
        parent::__construct($context, $data);
        $this->contactResource = $contactResource;
    }





    public function getContactOptions()
    {
        return $this->contactResource->getContactOptions();
    }


}
