<?php

namespace Siwapp\ConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class GlobalSettingsType extends AbstractType
{
    protected static $paper_sizes = array(
        "4a0" => "4A0", "2a0" => "2A0", "a0" => "A0", "a1" => "A1", "a2" => "A2", "a3" => "A3", "a4" => "A4", "a5" => "A5", "a6" => "A6", "a7" => "A7", "a8" => "A8", "a9" => "A9", "a10" => "A10", "b0" => "B0", "b1" => "B1", "b2" => "B2", "b3" => "B3", "b4" => "B4", "b5" => "B5", "b6" => "B6", "b7" => "B7", "b8" => "B8", "b9" => "B9", "b10" => "B10", "c0" => "C0", "c1" => "C1", "c2" => "C2", "c3" => "C3", "c4" => "C4", "c5" => "C5", "c6" => "C6", "c7" => "C7", "c8" => "C8", "c9" => "C9", "c10" => "C10", "ra0" => "RA0", "ra1" => "RA1", "ra2" => "RA2", "ra3" => "RA3", "ra4" => "RA4", "sra0" => "SRA0", "sra1" => "SRA1", "sra2" => "SRA2", "sra3" => "SRA3", "sra4" => "SRA4", "letter" => "Letter", "legal" => "Legal", "ledger" => "Ledger", "tabloid" => "Tabloid", "executive" => "Executive", "folio" => "Folio", "commerical #10 envelope" => "Commercial #10 Envelope", "catalog #10 1/2 envelope" => "Catalog #10 1/2 Envelope", "8.5x11" => "8.5x11", "8.5x14" => "8.5x14", "11x17" => "11x17"
    );
        
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('company_name', 'text', array('required' => false))
            ->add('company_address', 'textarea', array('required' => false))
            ->add('company_phone', 'text', array('required' => false))
            ->add('company_fax', 'text', array('required' => false))
            ->add('company_email', 'email', array('required' => false))
            ->add('company_url', 'url', array('required' => false))
            // TODO: find a way to get the currency choices here
            ->add('currency', 'choice', array(
                'choices' => array(),
                'required' => false
            ))
            ->add('legal_terms', 'textarea', array('required' => false))
            ->add('pdf_size', 'choice', array(
                'choices' => self::$paper_sizes
                )
            )
            ->add('pdf_orientation', 'choice', array(
                'choices' => array(
                    'portrait' => 'Portrait',
                    'landscape' => 'Landscape'
                )
            ))
        ;
    }

    public function getName()
    {
        return 'siwapp_configbundle_settingstype';
    }
}
