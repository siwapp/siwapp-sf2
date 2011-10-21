<?php

namespace Siwapp\InvoiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Siwapp\CoreBundle\Form\AbstractInvoiceType;

class InvoiceType extends AbstractInvoiceType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder
            ->add('draft')
            ->add('closed')
            ->add('sent_by_email')
            ->add('number')
            ->add('recurring_invoice_id')
            ->add('issue_date')
            ->add('due_date')
        ;
    }

    public function getName()
    {
        return 'siwapp_invoicebundle_invoicetype';
    }
}
