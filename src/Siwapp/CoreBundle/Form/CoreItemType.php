<?php

namespace Siwapp\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CoreItemType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('quantity')
            ->add('discount')
            ->add('description')
            ->add('unitary_cost')
        ;
    }

    public function getName()
    {
        return 'siwapp_corebundle_coreitemtype';
    }
}
