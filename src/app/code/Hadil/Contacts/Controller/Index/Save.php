<?php
// VotreNom/Module/Controller/Index/Save.php

namespace Hadil\Contacts\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Hadil\Contacts\Model\CustomerContactFactory;

class Save extends Action
{
protected $customerContactFactory;

public function __construct(
Context $context,
CustomerContactFactory $customerContactFactory
) {
parent::__construct($context);
$this->customerContactFactory = $customerContactFactory;
}

public function execute()
{


    dd("hi!!!!!!!!!!!!!!!!!!!!!!");
$postData = $this->getRequest()->getPostValue();

if ($postData) {
$customerContactModel = $this->customerContactFactory->create();
$customerContactModel->setData($postData);
$customerContactModel->save();

// Ajoutez ici le code pour envoyer un e-mail si nécessaire

$this->messageManager->addSuccessMessage(__('Contact request has been submitted.'));
$this->_redirect('*/*/'); // Rediriger vers la page d'accueil ou une autre page après la soumission
} else {
$this->_redirect('*/*/'); // Rediriger vers la page d'accueil ou une autre page si aucune donnée n'a été soumise
}
}
}
