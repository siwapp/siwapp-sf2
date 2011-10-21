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
            ->add('invoicing_address', 'textarea')
            ->add('shipping_address', 'textarea')
            ->add('contact_person')
            ->add('terms', 'textarea')
            ->add('notes', 'textarea')
            ->add('status')
        ;
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Siwapp\CoreBundle\Entity\AbstractInvoice',
        );
    }

    public function getName()
    {
        return 'siwapp_corebundle_abstractinvoicetype';
    }
}
