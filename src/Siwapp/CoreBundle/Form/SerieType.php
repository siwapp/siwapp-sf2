<?php

namespace Siwapp\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SerieType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('value')
            ->add('first_number', 'integer')
            ->add('enabled', 'checkbox', array('required' => false))
        ;
    }

    public function getName()
    {
        return 'siwapp_corebundle_serietype';
    }
}
