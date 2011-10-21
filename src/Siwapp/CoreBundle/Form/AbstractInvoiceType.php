<?php

namespace Siwapp\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AbstractInvoiceType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('series_id')
            ->add('customer_id')
            ->add('customer_name')
            ->add('customer_identification')
            ->add('customer_email')
            ->add('invoicing_address')
            ->add('shipping_address')
            ->add('contact_person')
            ->add('terms')
            ->add('notes')
            ->add('base_amount')
            ->add('discount_amount')
            ->add('net_amount')
            ->add('gross_amount')
            ->add('paid_amount')
            ->add('tax_amount')
            ->add('status')
        ;
    }

    public function getName()
    {
        return 'siwapp_corebundle_abstractinvoicetype';
    }
}
