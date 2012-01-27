<?php

namespace Siwapp\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TaxType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('value')
            ->add('active', 'checkbox', array('required' => false))
            ->add('is_default', 'checkbox', array('required' => false))
        ;
    }

    public function getName()
    {
        return 'siwapp_corebundle_taxtype';
    }
}
