<?php

namespace Siwapp\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AbstractItemType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('quantity', 'number')
            ->add('discount', 'percent')
            ->add('description')
            ->add('unitary_cost', 'money')
        ;
    }

    public function getName()
    {
        return 'siwapp_corebundle_abstractitemtype';
    }
}
