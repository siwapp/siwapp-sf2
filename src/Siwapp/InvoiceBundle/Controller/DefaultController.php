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
     * @Route("/silly", name="silly_index")
     * @Template()
     */
    public function sillyAction()
    {
        $repo = $this->getDoctrine()->getEntityManager()
            ->getRepository('SiwappInvoiceBundle:Invoice');
        $repo->updateTotals();
        return array();
    }
    /**
     * @Route("/", name="invoice_index")
     * @Template
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        
        $entities = $em->getRepository('SiwappInvoiceBundle:Invoice')->findAll();
        
        return array('entities' => $entities);
    }
    
    /**
     * @Route("/{id}/show", name="invoice_show")
     * @Template
     */
    public function showAction()
    {
        return array();
    }
    
    /**
     * @Route("/new", name="invoice_add")
     * @Template("SiwappInvoiceBundle:Default:edit.html.twig")
     */
    public function newAction()
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
     * @Route("/{id}/edit", name="invoice_edit")
     * @Template
     */
    public function editAction($id)
    {
        $entity = $this->getDoctrine()
            ->getRepository('SiwappInvoiceBundle:Invoice')
            ->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Invoice entity.');
        }
        $form = $this->createForm(new InvoiceType(), $entity);
        
        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }
    
    /**
     * @Route("/{id}/update", name="invoice_update")
     * @Method("POST")
     * @Template("SiwappInvoiceBundle:Default:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entity = $em->getRepository('SiwappInvoiceBundle:Invoice')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Invoice entity.');
        }
        
        $form = $this->createForm(new InvoiceType(), $entity);
        $request = $this->getRequest();
        
        $form->bindRequest($request);
        
        if ($form->isValid()) {
            $em->persist($entity);
            $em->flush();
            
            return $this->redirect($this->generateUrl('invoice_edit', array('id' => $id)));
        }
        
        return array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
        );
    }
    
    /**
     * @Route("/{id}/delete", name="invoice_delete")
     */
    public function deleteAction($id)
    {
        return $this->redirect($this->generateUrl('invoice_index'));
    }
    
    /**
     * @Route("/payments/{invoiceId}", name="invoice_payments")
     * @Template("SiwappInvoiceBundle:Partials:payments.html.twig")
     */
    public function paymentsAction($invoiceId)
    {
        // Return all payments
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('SiwappInvoiceBundle:Payment')->findBy(array('invoice' => $invoiceId));

        return array('entities' => $entities, 'invoiceId' => $invoiceId);
    }
    
    /**
     * @Route("/payments/{invoiceId}/add", name="invoice_payment_add")
     * @Method("POST")
     * @Template("SiwappInvoiceBundle:Partials:payments_form.html.twig")
     */
    public function addPaymentAction($invoiceId)
    {
        // Add payment and return all payments
        // Set Flash with message...
        return array('invoiceId' => $invoiceId);
    }
    
    /**
     * @Route("/payments/{invoiceId}/delete", name="invoice_payment_delete")
     * @Method("POST")
     * @Template("SiwappInvoiceBundle:Partials:payments_form.html.twig")
     */
    public function deletePayment($invoiceId)
    {
        // Delete payments and return payments
        // Set Flash with message...
        return array('invoiceId' => $invoiceId);
    }
}
