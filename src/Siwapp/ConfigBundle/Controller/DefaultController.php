<?php

namespace Siwapp\ConfigBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Siwapp\ConfigBundle\Form\SettingsType;

/**
 * @Route("/configuration")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/settings", name="configuration_settings")
     * @Template()
     */
    public function settingsAction()
    {
        $form = $this->createForm(new SettingsType());
        return array(
            'form' => $form->createView(),
        );
    }
}
