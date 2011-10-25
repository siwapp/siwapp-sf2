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
    
    /**
     * @Route("/payments/{invoiceId}", name="invoice_payments")
     * @Template
     */
    public function paymentsAction($invoiceId)
    {
        // Return all payments
        return array();
    }
    
    /**
     * @Route("/payments/{invoiceId}/add", name="invoice_payment_add")
     * @Method("POST")
     */
    public function addPaymentAction($invoiceId)
    {
        // Add payment and return all payments
        return $this->forward('SiwappInvoiceBundle:Default:payments', array(
            'invoiceId' => $invoiceId
        ));
    }
    
    /**
     * @Route("/payments/{invoiceId}/delete/{paymentId}", name="invoice_payment_delete")
     */
    public function deletePayment($invoiceId, $paymentId)
    {
        // Delete payment and return all payments
        return $this->forward('SiwappInvoiceBundle:Default:payments', array(
            'invoiceId' => $invoiceId
        ));
    }
}
