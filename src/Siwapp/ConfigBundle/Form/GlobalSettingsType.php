<?php

namespace Siwapp\ConfigBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Siwapp\CoreBundle\Form\TaxType;
use Siwapp\CoreBundle\Form\SerieType;

class GlobalSettingsType extends AbstractType
{
    protected static $paper_sizes = array(
        "4a0" => "4A0", "2a0" => "2A0", "a0" => "A0", "a1" => "A1", "a2" => "A2", "a3" => "A3", "a4" => "A4", "a5" => "A5", "a6" => "A6", "a7" => "A7", "a8" => "A8", "a9" => "A9", "a10" => "A10", "b0" => "B0", "b1" => "B1", "b2" => "B2", "b3" => "B3", "b4" => "B4", "b5" => "B5", "b6" => "B6", "b7" => "B7", "b8" => "B8", "b9" => "B9", "b10" => "B10", "c0" => "C0", "c1" => "C1", "c2" => "C2", "c3" => "C3", "c4" => "C4", "c5" => "C5", "c6" => "C6", "c7" => "C7", "c8" => "C8", "c9" => "C9", "c10" => "C10", "ra0" => "RA0", "ra1" => "RA1", "ra2" => "RA2", "ra3" => "RA3", "ra4" => "RA4", "sra0" => "SRA0", "sra1" => "SRA1", "sra2" => "SRA2", "sra3" => "SRA3", "sra4" => "SRA4", "letter" => "Letter", "legal" => "Legal", "ledger" => "Ledger", "tabloid" => "Tabloid", "executive" => "Executive", "folio" => "Folio", "commerical #10 envelope" => "Commercial #10 Envelope", "catalog #10 1/2 envelope" => "Catalog #10 1/2 Envelope", "8.5x11" => "8.5x11", "8.5x14" => "8.5x14", "11x17" => "11x17"
    );
    
    // currencies retrieved from http://stackoverflow.com/questions/8860079/currencies-list-in-symfony2
    protected static $currencies = array(
                'AED' => 'AED',    'AFN' => 'AFN',    'ALL' => 'ALL',
                'AMD' => 'AMD',    'ANG' => 'ANG',    'AOA' => 'AOA',
                'ARS' => 'ARS',    'AUD' => 'AUD',    'AWG' => 'AWG',
                'AZN' => 'AZN',    'BAM' => 'BAM',    'BBD' => 'BBD',
                'BDT' => 'BDT',    'BGN' => 'BGN',    'BHD' => 'BHD',
                'BIF' => 'BIF',    'BMD' => 'BMD',    'BND' => 'BND',
                'BOB' => 'BOB',    'BRL' => 'BRL',    'BSD' => 'BSD',
                'BTN' => 'BTN',    'BWP' => 'BWP',    'BYR' => 'BYR',
                'BZD' => 'BZD',    'CAD' => 'CAD',    'CDF' => 'CDF',
                'CHF' => 'CHF',    'CLP' => 'CLP',    'CNY' => 'CNY',
                'COP' => 'COP',    'CRC' => 'CRC',    'CUC' => 'CUC',
                'CUP' => 'CUP',    'CVE' => 'CVE',    'CZK' => 'CZK',
                'DJF' => 'DJF',    'DKK' => 'DKK',    'DOP' => 'DOP',
                'DZD' => 'DZD',    'EGP' => 'EGP',    'ERN' => 'ERN',
                'ETB' => 'ETB',    'EUR' => 'EUR',    'FJD' => 'FJD',
                'FKP' => 'FKP',    'GBP' => 'GBP',    'GEL' => 'GEL',
                'GGP' => 'GGP',    'GHS' => 'GHS',    'GIP' => 'GIP',
                'GMD' => 'GMD',    'GNF' => 'GNF',    'GTQ' => 'GTQ',
                'GYD' => 'GYD',    'HKD' => 'HKD',    'HNL' => 'HNL',
                'HRK' => 'HRK',    'HTG' => 'HTG',    'HUF' => 'HUF',
                'IDR' => 'IDR',    'ILS' => 'ILS',    'IMP' => 'IMP',
                'INR' => 'INR',    'IQD' => 'IQD',    'IRR' => 'IRR',
                'ISK' => 'ISK',    'JEP' => 'JEP',    'JMD' => 'JMD',
                'JOD' => 'JOD',    'JPY' => 'JPY',    'KES' => 'KES',
                'KGS' => 'KGS',    'KHR' => 'KHR',    'KMF' => 'KMF',
                'KPW' => 'KPW',    'KRW' => 'KRW',    'KWD' => 'KWD',
                'KYD' => 'KYD',    'KZT' => 'KZT',    'LAK' => 'LAK',
                'LBP' => 'LBP',    'LKR' => 'LKR',    'LRD' => 'LRD',
                'LSL' => 'LSL',    'LTL' => 'LTL',    'LVL' => 'LVL',
                'LYD' => 'LYD',    'MAD' => 'MAD',    'MDL' => 'MDL',
                'MGA' => 'MGA',    'MKD' => 'MKD',    'MMK' => 'MMK',
                'MNT' => 'MNT',    'MOP' => 'MOP',    'MRO' => 'MRO',
                'MUR' => 'MUR',    'MVR' => 'MVR',    'MWK' => 'MWK',
                'MXN' => 'MXN',    'MYR' => 'MYR',    'MZN' => 'MZN',
                'NAD' => 'NAD',    'NGN' => 'NGN',    'NIO' => 'NIO',
                'NOK' => 'NOK',    'NPR' => 'NPR',    'NZD' => 'NZD',
                'OMR' => 'OMR',    'PAB' => 'PAB',    'PEN' => 'PEN',
                'PGK' => 'PGK',    'PHP' => 'PHP',    'PKR' => 'PKR',
                'PLN' => 'PLN',    'PYG' => 'PYG',    'QAR' => 'QAR',
                'RON' => 'RON',    'RSD' => 'RSD',    'RUB' => 'RUB',
                'RWF' => 'RWF',    'SAR' => 'SAR',    'SBD' => 'SBD',
                'SCR' => 'SCR',    'SDG' => 'SDG',    'SEK' => 'SEK',
                'SGD' => 'SGD',    'SHP' => 'SHP',    'SLL' => 'SLL',
                'SOS' => 'SOS',    'SPL' => 'SPL',    'SRD' => 'SRD',
                'STD' => 'STD',    'SVC' => 'SVC',    'SYP' => 'SYP',
                'SZL' => 'SZL',    'THB' => 'THB',    'TJS' => 'TJS',
                'TMT' => 'TMT',    'TND' => 'TND',    'TOP' => 'TOP',
                'TRY' => 'TRY',    'TTD' => 'TTD',    'TVD' => 'TVD',
                'TWD' => 'TWD',    'TZS' => 'TZS',    'UAH' => 'UAH',
                'UGX' => 'UGX',    'USD' => 'USD',    'UYU' => 'UYU',
                'UZS' => 'UZS',    'VEF' => 'VEF',    'VND' => 'VND',
                'VUV' => 'VUV',    'WST' => 'WST',    'XAF' => 'XAF',
                'XCD' => 'XCD',    'XDR' => 'XDR',    'XOF' => 'XOF',
                'XPF' => 'XPF',    'YER' => 'YER',    'ZAR' => 'ZAR',
                'ZMK' => 'ZMK',    'ZWD' => 'ZWD',
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
            ->add('company_logo', 'file', array('required' => false))
            ->add('currency', 'choice', array(
                'choices' => self::$currencies,
                'preferred_choices' => array('EUR', 'USD', 'RUB', 'LVL', 'LTL')
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
        
        $builder->add('taxes', 'collection', array(
            'type' => new TaxType(),
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
        ));
        
        $builder->add('series', 'collection', array(
            'type' => new SerieType(),
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
        ));
    }

    public function getName()
    {
        return 'siwapp_configbundle_settingstype';
    }
}
