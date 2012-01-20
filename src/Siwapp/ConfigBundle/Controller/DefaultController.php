<?php

namespace Siwapp\ConfigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Siwapp\ConfigBundle\Form\GlobalSettingsType;
use Siwapp\ConfigBundle\Entity\PropertyRepository;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/configuration")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/global_settings", name="global_settings")
     * @Template()
     */
    public function globalSettingsAction(Request $request)
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
            'company_logo' => $property_repository->get('company_logo'),
            'currency' => $property_repository->get('currency', 'USD'),
            'legal_terms' => $property_repository->get('legal_terms'),
            'pdf_size' => $property_repository->get('pdf_size', 'a4'),
            'pdf_orientation' => $property_repository->get('pdf_orientation', 'portrait')
        );
        
        $form = $this->createForm(new GlobalSettingsType(), $data);
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if($form->isValid()) {
                $data = $form->getData();
                
                $property_repository->set('company_name', $data['company_name']);
                $property_repository->set('company_address', $data['company_address']);
                $property_repository->set('company_phone', $data['company_phone']);
                $property_repository->set('company_fax', $data['company_fax']);
                $property_repository->set('company_email', $data['company_email']);
                $property_repository->set('company_url', $data['company_url']);
                $property_repository->set('company_logo', $data['company_logo']);
                $property_repository->set('currency', $data['currency']);
                $property_repository->set('legal_terms', $data['legal_terms']);
                $property_repository->set('pdf_size', $data['pdf_size']);
                $property_repository->set('pdf_orientation', $data['pdf_orientation']);
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }
}
