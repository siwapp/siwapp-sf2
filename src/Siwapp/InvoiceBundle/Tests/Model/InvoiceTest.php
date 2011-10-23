<?php

use Siwapp\InvoiceBundle\Entity\Invoice;

class InvoiceTest extends PHPUnit_Framework_TestCase
{
  public function testTrial()
  {
    $inv = new Invoice();
    $this->assertEquals(0,0);
  }
}