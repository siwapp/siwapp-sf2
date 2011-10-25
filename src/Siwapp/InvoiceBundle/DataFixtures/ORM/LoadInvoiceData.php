<?php
namespace Siwapp\InvoiceBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Siwapp\InvoiceBundle\Entity\Invoice;

class LoadInvoiceData implements FixtureInterface
{
    public function load($manager)
    {
        $invoice = new Invoice();
        $invoice->setCustomerName('admin');
        $invoice->setDraft(true);

        $manager->persist($invoice);
        $manager->flush();
    }
}