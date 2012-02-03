<?php

namespace Siwapp\InvoiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;


class PaymentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('amount')
            ->add('notes')
        ;
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Siwapp\InvoiceBundle\Entity\Payment',
        );
    }
    
    public function getName()
    {
        return 'siwapp_invoicebundle_paymenttype';
    }
}
