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
        $em = $this->getDoctrine()->getEntityManager();
        $property_repository = $em->getRepository('SiwappConfigBundle:Property');
        
        $data = $property_repository->getAll();
        $data['taxes'] = $em->getRepository('SiwappCoreBundle:Tax')->findAll();
        $data['series'] = $em->getRepository('SiwappCoreBundle:Serie')->findAll();
        
        $form = $this->createForm(new GlobalSettingsType(), $data);
        
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if($form->isValid()) {
                $data = $form->getData();
				unset($data['series'], $data['taxes']);				
                $property_repository->setPropertiesFromArray($data);
            }
        }
        
        return array(
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/my_settings", name="my_settings")
     * @Template()
     */
    public function mySettingsAction(Request $request)
    {
        
    }
    
    /**
     * @Route("/printing_templates", name="printing_templates")
     * @Template()
     */
    public function printingTemplatesAction(Request $request)
    {
        
    }
    
    /**
     * @Route("/modules", name="modules")
     * @Template()
     */
    public function modulesAction(Request $request)
    {
        
    }
}
