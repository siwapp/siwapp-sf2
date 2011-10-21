<?php

namespace Siwapp\RecurringInvoiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/recurring")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="recurring_index")
     * @Template
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/show", name="recurring_show")
     * @Template
     */
    public function showAction()
    {
        return array();
    }
    
    /**
     * @Route("/add", name="recurring_add")
     * @Template("SiwappRecurringInvoiceBundle:Default:edit.html.twig")
     */
    public function addAction()
    {
        return array();
    }
    
    /**
     * @Route("/create", name="recurring_create")
     * @Method("POST")
     * @Template("SiwappRecurringInvoiceBundle:Default:edit.html.twig")
     */
    public function createAction()
    {
        return $this->redirect($this->generateUrl('recurring_edit'));
    }
    
    /**
     * @Route("/edit", name="recurring_edit")
     * @Template
     */
    public function editAction()
    {
        return array();
    }
    
    /**
     * @Route("/update", name="recurring_update")
     * @Method("POST")
     * @Template("SiwappRecurringInvoiceBundle:Default:edit.html.twig")
     */
    public function updateAction()
    {
        return $this->redirect($this->generateUrl('recurring_edit'));
    }
    
    /**
     * @Route("/delete", name="recurring_delete")
     */
    public function deleteAction()
    {
        return $this->redirect($this->generateUrl('recurring_index'));
    }
}
