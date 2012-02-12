<?php

use Siwapp\InvoiceBundle\Entity\Invoice;
use Siwapp\InvoiceBundle\Entity\Item;
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
        // checks post save ??
        $this->em->persist($test_invoice);
        $this->em->flush();
        $this->assertEquals($test_invoice->getBaseAmount(),7198.85);
        $this->assertEquals($test_invoice->getNetAmount(),7198.85);
        $this->assertEquals($test_invoice->getTaxAmount(),1034.7995);
        $this->assertEquals($test_invoice->getGrossAmount(),8233.65);

        // recalculate when deleting item
        $items = $test_invoice->getItems();
        $test_invoice->removeItem($items[2]);
        $this->em->flush();
        $this->assertEquals(count($test_invoice->getItems()),4);
        $this->assertEquals($test_invoice->getGrossAmount(), 8072.36);
        // recalculate when adding item
        $new_item = new Item();
        $new_item->setDescription("test item");
        $new_item->setUnitaryCost(100);
        $new_item->setQuantity(1);
        $new_item->setDiscount(0);
        $this->em->persist($new_item);
        $test_invoice->addNewItem($new_item);
        $this->em->flush();
        $this->assertEquals($test_invoice->getGrossAmount(),8172.36);
        // recalculate when updating item
        $item = $items[0];
        $item->setQuantity($item->getQuantity*2);
        $this->em->flush();
        $this->assertEquals($test_invoice->getGrossAmount(),6903.01);

        // TODO: check number generation

        // TODO: check that when changing series, the number changes

        // TODO: check savings with modified customer data
        

    }
}