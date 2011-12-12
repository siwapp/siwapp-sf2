<?php

use Siwapp\InvoiceBundle\Entity\Invoice;
use Siwapp\CoreBundle\Tests\SiwappBaseTest;
use Symfony\Bundle\FrameworkBundle\Console\Application;


class InvoiceTest extends SiwappBaseTest
{
    public function testTrial()
    {
        $inv = new Invoice();
        $this->assertEquals(0,0);
        $repo = $this->em->getRepository('SiwappInvoiceBundle:Invoice');
        foreach($repo->findAll() as $inv)
        {
            echo $inv;
        }
        echo "B";
    }
}