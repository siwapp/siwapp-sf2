<?php

namespace Siwapp\InvoiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Siwapp\InvoiceBundle\Form\InvoiceType;

/**
 * @Route("/invoices")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/", name="invoice_index")
     * @Template
     */
    public function indexAction()
    {
        return array();
    }
    
    /**
     * @Route("/show", name="invoice_show")
     * @Template
     */
    public function showAction()
    {
        return array();
    }
    
    /**
     * @Route("/add", name="invoice_add")
     * @Template("SiwappInvoiceBundle:Default:edit.html.twig")
     */
    public function addAction()
    {
        $form = $this->createForm(new InvoiceType());
        return array(
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/create", name="invoice_create")
     * @Method("POST")
     * @Template("SiwappInvoiceBundle:Default:edit.html.twig")
     */
    public function createAction()
    {
        return $this->redirect($this->generateUrl('invoice_edit'));
    }
    
    /**
     * @Route("/edit", name="invoice_edit")
     * @Template
     */
    public function editAction()
    {
        $form = $this->createForm(new InvoiceType());
        return array(
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/update", name="invoice_update")
     * @Method("POST")
     * @Template("SiwappInvoiceBundle:Default:edit.html.twig")
     */
    public function updateAction()
    {
        return $this->redirect($this->generateUrl('invoice_edit'));
    }
    
    /**
     * @Route("/delete", name="invoice_delete")
     */
    public function deleteAction()
    {
        return $this->redirect($this->generateUrl('invoice_index'));
    }
}
