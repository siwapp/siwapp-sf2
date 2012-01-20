<?php

namespace Siwapp\ConfigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Siwapp\ConfigBundle\Form\GlobalSettingsType;
use Siwapp\ConfigBundle\Entity\PropertyRepository;


/**
 * @Route("/configuration")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/global_settings", name="global_settings")
     * @Template()
     */
    public function globalSettingsAction()
    {
        $property_repository = $this->getDoctrine()->getEntityManager()
            ->getRepository('SiwappConfigBundle:Property');
        
        $data = array(
            'company_name' => $property_repository->get('company_name'),
            'company_address' => $property_repository->get('company_address'),
            'company_phone' => $property_repository->get('company_phone'),
            'company_fax' => $property_repository->get('company_fax'),
            'company_email' => $property_repository->get('company_email'),
            'company_url' => $property_repository->get('company_url'),
            'currency' => $property_repository->get('currency', 'USD'),
            'legal_terms' => $property_repository->get('legal_terms'),
            'pdf_size' => $property_repository->get('pdf_size', 'a4'),
            'pdf_orientation' => $property_repository->get('pdf_orientation', 'portrait')
        );
        
        $form = $this->createForm(new GlobalSettingsType(), $data);
        return array(
            'form' => $form->createView(),
        );
    }
}
