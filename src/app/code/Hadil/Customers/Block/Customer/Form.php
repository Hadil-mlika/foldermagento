<?php

namespace Hadil\Customers\Block\Customer;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Hadil\Customers\Model\ResourceModel\Contact;
use Magento\Framework\UrlInterface;
class Form extends Template
{

    protected $contactResource;
    protected $urlBuilder;
    public function __construct(Context $context,Contact $contactResource , UrlInterface $urlBuilder, array $data = [] )
    {
        parent::__construct($context, $data);
        $this->contactResource = $contactResource;
        $this->urlBuilder = $urlBuilder;
    }





    public function getContactOptions()
    {
        return $this->contactResource->toOptionArray();
    }


    public function getSavedUrl()
    {

        dd("h!!!!!!!!!!!!!!!!!!!!!!!!!!");
        // Exemple de construction d'une URL vers le contrôleur "save" dans le module "your_module"
        $route = 'Customers/Controller/save';


        return $this->urlBuilder->getUrl($route);
    }



    public function getFormAction(){
       return $this->getUrl("customers/customer/save",["_secure"=>true]) ;

    }

}
