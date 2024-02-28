<?php


namespace Hadil\Contacts\Model\ResourceModel;

class Contact implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'shipping_complaint', 'label' => __('J’ai une réclamation concernant l’expédition de ma commande')],
            ['value' => 'product_information', 'label' => __('Je veux en savoir plus concernant des produits que j’ai achetés')],
            ['value' => 'return_products', 'label' => __('Je souhaite retourner des produits')],
            ['value' => 'other_request', 'label' => __('Autre demande')],
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'shipping_complaint' => __('J’ai une réclamation concernant l’expédition de ma commande'),
            'product_information' => __('Je veux en savoir plus concernant des produits que j’ai achetés'),
            'return_products' => __('Je souhaite retourner des produits'),
            'other_request' => __('Autre demande'),
        ];
    }


    public function getContactOptions()
    {
        return [
            'shipping_complaint' => __('J’ai une réclamation concernant l’expédition de ma commande'),
            'product_information' => __('Je veux en savoir plus concernant des produits que j’ai achetés'),
            'return_products' => __('Je souhaite retourner des produits'),
            'other_request' => __('Autre demande'),
        ];
    }
}
