<?php

namespace Siwapp\InvoiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder
            ->add('invoice')
        ;
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Siwapp\InvoiceBundle\Entity\Item',
        );
    }
    
    public function getName()
    {
        return 'siwapp_invoicebundle_itemtype';
    }
}
