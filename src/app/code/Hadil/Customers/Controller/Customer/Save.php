<?php

namespace Hadil\Customers\Controller\Customer;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Hadil\Customers\Model\Customer;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Save extends Action
{
    protected $resultPageFactory;
    protected $extensionFactory;
    protected $customer;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        Customer $customer
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->customer = $customer;
        parent::__construct($context);
    }

    public function execute()
    {
        try {

            $data = $this->getRequest()->getPostValue();

            //dd($data);

           // dd("gvuebfjrbekjfvnkfnv");

            if ($data) {

                $model = $this->customer;


                //dd($model);


                $model->setData($data);
                //dd($model);

                $model->save();

                //dd($model);


                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            //dd("$e");


            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;

    }
}
