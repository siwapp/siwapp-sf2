<?php

namespace Siwapp\ConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SettingsType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('company_name')
            ->add('company_address')
            ->add('company_phone')
            ->add('company_fax')
            ->add('company_email')
            ->add('company_url')
            ->add('currency')
            ->add('legal_terms', 'textarea')
            ->add('pdf_size')
            ->add('pdf_orientation')
        ;
    }

    public function getName()
    {
        return 'siwapp_configbundle_settingstype';
    }
}
