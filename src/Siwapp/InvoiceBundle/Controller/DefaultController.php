<?php

namespace Siwapp\InvoiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/invoices")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {
        return array();
    }
}
