<?php

use Siwapp\InvoiceBundle\Entity\Invoice;
use Siwapp\CoreBundle\Tests\SiwappBaseTest;


class InvoiceTest extends SiwappBaseTest
{
    public function testTrial()
    {
        $test_invoice = $this->getRepo('invoice')->find(1);
        // test amounts calculation
        $test_invoice->setAmounts();
        $this->assertEquals($test_invoice->getBaseAmount(),7198.85);
        $this->assertEquals($test_invoice->getNetAmount(),7198.85);
        $this->assertEquals($test_invoice->getTaxAmount(),1034.7995);
        $this->assertEquals($test_invoice->getGrossAmount(),8233.65);

        // test tax_amount_<tax_name> property
        $this->assertEquals($test_invoice->tax_amount_iva16, 862.64);
        // TODO checks post save

        // deleting
        $items = $test_invoice->getItems();
        echo count($items);
        $this->em->remove($items[0]);
        $this->em->flush();
        $this->em->detach($test_invoice);
        $t2_invoice = $this->getRepo('invoice')->find(1);
        echo count($t2_invoice->getItems());
        
        
        
        
        /*

        $inv = new Invoice();
        $this->assertEquals(0,0);
        $repo = $this->em->getRepository('SiwappInvoiceBundle:Invoice');
        foreach($repo->findAll() as $inv)
        {
            echo $inv->getId().", ".$inv->getCustomerName()."\n";
        }
        */
    }
}