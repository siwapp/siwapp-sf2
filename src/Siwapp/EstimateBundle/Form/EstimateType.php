<?php

namespace Siwapp\EstimateBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class EstimateType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder
            ->add('draft')
            ->add('number')
            ->add('sent_by_email')
        ;
    }
    
    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Siwapp\EstimateBundle\Entity\Estimate',
        );
    }

    public function getName()
    {
        return 'siwapp_estimatebundle_estimatetype';
    }
}
