<?php

namespace Siwapp\EstimateBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/estimates")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="estimate_index")
     * @Template
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/show", name="estimate_show")
     * @Template
     */
    public function showAction()
    {
        return array();
    }
    
    /**
     * @Route("/add", name="estimate_add")
     * @Template("SiwappEstimateBundle:Default:edit.html.twig")
     */
    public function addAction()
    {
        return array();
    }
    
    /**
     * @Route("/create", name="estimate_create")
     * @Method("POST")
     * @Template("SiwappEstimateBundle:Default:edit.html.twig")
     */
    public function createAction()
    {
        return $this->redirect($this->generateUrl('estimate_edit'));
    }
    
    /**
     * @Route("/edit", name="estimate_edit")
     * @Template
     */
    public function editAction()
    {
        return array();
    }
    
    /**
     * @Route("/update", name="estimate_update")
     * @Method("POST")
     * @Template("SiwappEstimateBundle:Default:edit.html.twig")
     */
    public function updateAction()
    {
        return $this->redirect($this->generateUrl('estimate_edit'));
    }
    
    /**
     * @Route("/delete", name="estimate_delete")
     */
    public function deleteAction()
    {
        return $this->redirect($this->generateUrl('estimate_index'));
    }
}
