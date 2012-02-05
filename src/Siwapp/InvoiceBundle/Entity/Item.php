<?php

namespace Siwapp\InvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Siwapp\CoreBundle\Entity\AbstractItem;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Siwapp\InvoiceBundle\Entity\Item
 *
 * @ORM\Entity
 * @ORM\Table(indexes={
 *    @ORM\index(name="invoice_item_desc_idx", columns={"description"})
 * }, name="InvoiceItem")
 */
class Item extends AbstractItem
{
    /**
    * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="items")
    *
    */
    private $invoice;

    /**
     * @ORM\ManyToMany(targetEntity="Siwapp\CoreBundle\Entity\Tax")
     * @ORM\JoinTable(name="InvoiceItems_Taxes")
     *
     * unidirectional many-to-many
     */
    private $taxes;

    public function __construct()
    {
      $this->taxes = new ArrayCollection();
    }

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
    
    /**
     * Add taxes
     *
     * @param Siwapp\CoreBundle\Entity\Tax $tax
     */
    public function addTax(\Siwapp\CoreBundle\Entity\Tax $tax)
    {
        $this->taxes[] = $tax;
    }

    /**
     * Get taxes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getTaxes()
    {
        return $this->taxes;
    }

    /**
     *
     * Remove Tax
     *
     * @param Siwapp\CoreBundle\Entity\Tax
     */
    public function removeTax(\Siwapp\CoreBundle\Entity\Tax $tax)
    {
        $this->taxes->removeElement($tax);
    }

    /** ********** CUSTOM METHODS ********* **/

    /** ********** RELATIONSHIP METHODS *** **/
    
    /**
     * setParent
     * Generic method to set the 'owner' of this item
     * it can be either an invoice, recurriong invoice , estimate..
     *
     * @param \Siwapp\InvoiceBundle\Entity\Invoice $invoice
     * @author JoeZ99 <jzarate@gmail.com>
     */
    protected function setParent(\Siwapp\InvoiceBundle\Entity\Invoice $invoice)
    {
        $this->setInvoice($invoice);
    }
}