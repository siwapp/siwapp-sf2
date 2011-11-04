<?php

namespace Siwapp\InvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Siwapp\CoreBundle\Entity\AbstractItem;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Siwapp\InvoiceBundle\Entity\Item
 *
 * @ORM\Entity
 * @ORM\Table(indexes={
 *    @ORM\index(name="desc_idx", columns={"description"})
 * })
 */
class Item extends AbstractItem
{
    /**
    * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="items")
    *
    */
    private $invoice;


    /**
     * Set invoice
     *
     * @param Siwapp\InvoiceBundle\Entity\AbstractInvoice $invoice
     */
  //    public function setInvoice(\Siwapp\InvoiceBundle\Entity\AbstractInvoice $invoice)y
    public function setInvoice(\Siwapp\InvoiceBundle\Entity\Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Get invoice
     *
     * @return Siwapp\InvoiceBundle\Entity\AbstractInvoice 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
    
    public function __toString()
    {
        return $this->description;
    }
}