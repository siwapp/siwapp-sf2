<?php

namespace Siwapp\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="dashboard_index")
     * @Template
     */
    public function indexAction()
    {
        $invoices = array(
            array(
                'id' => '2',
                'number' => 'ASET-02',
                'customer' => 'Roxxon',
                'date' => '05/28/2011',
                'duedate' => '09/16/2011',
                'status' => array('', 'draft'),
                'due' => '',
                'total' => '$11,435.23',
            ),
            array(
                'id' => '3',
                'number' => 'ASET-03',
                'customer' => 'Roxxon',
                'date' => '05/28/2011',
                'duedate' => '09/16/2011',
                'status' => array('pending', 'pending'),
                'due' => '$9,000.00',
                'total' => '$11,435.23',
            ),
            array(
                'id' => '4',
                'number' => 'ASET-04',
                'customer' => 'Roxxon',
                'date' => '05/28/2011',
                'duedate' => '09/16/2011',
                'status' => array('paid', 'paid'),
                'due' => '',
                'total' => '$11,435.23',
            ),
        );
        
        $overdue = array(
            array(
                'id' => '1',
                'number' => 'ASET-01',
                'customer' => 'Roxxon',
                'date' => '05/28/2011',
                'duedate' => '09/16/2011',
                'status' => array('overdue', 'overdue'),
                'due' => '$4,000.00',
                'total' => '$11,435.23',
            ),
        );
        
        return array(
            'invoices' => $invoices,
            'overdue_invoices' => $overdue,
        );
    }
}
