<?php

namespace Siwapp\InvoiceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Siwapp\CoreBundle\Form\AbstractInvoiceType;
use Siwapp\InvoiceBundle\Entity\Item;
use Siwapp\InvoiceBundle\Form\ItemType;


class InvoiceType extends AbstractInvoiceType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder
            ->add('draft', 'hidden')
            ->add('closed', 'hidden')
            ->add('sent_by_email', 'hidden')
            ->add('number')
            ->add('recurring_invoice_id', 'hidden')
            ->add('issue_date', 'date', array('widget' => 'single_text'))
            ->add('due_date', 'date', array('widget' => 'single_text'))
        ;
        
        $builder->add('items', 'collection', array(
            'type' => new ItemType(),
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
        ));
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Siwapp\InvoiceBundle\Entity\Invoice',
        );
    }

    public function getName()
    {
        return 'siwapp_invoicebundle_invoicetype';
    }
}
