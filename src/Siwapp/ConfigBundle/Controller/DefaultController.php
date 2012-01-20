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
        
        $data = $property_repository->getAll();
        
        $form = $this->createForm(new GlobalSettingsType(), $data);
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if($form->isValid()) {
                $data = $form->getData();
                $property_repository->setPropertiesFromArray($data);
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }
}
