<?php

namespace Siwapp\RecurringInvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Siwapp\CoreBundle\Entity\AbstractItem;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Siwapp\RecurringInvoiceBundle\Entity\Item
 *
 * @ORM\Entity
 * @ORM\Table(indexes={
 *    @ORM\index(name="desc_idx", columns={"description"})
 * }, name="RecurringInvoiceItem")
 */
class Item extends AbstractItem
{
  /**
   * @ORM\ManyToOne(targetEntity="RecurringInvoice", inversedBy="items")
   *
   */
  private $recurring_invoice;

  /**
   * @ORM\ManyToMany(targetEntity="Siwapp\CoreBundle\Entity\Tax")
   * @ORM\JoinTable(name="RecurringInvoiceItems_Taxes")
   */
  private $taxes;

  public function __construct()
  {
    $this->taxes = new ArrayCollection();
  }

    /**
     * Set invoice
     *
     * @param Siwapp\RecurringInvoiceBundle\Entity\RecurringInvoice $recurring_invoice
     */
    public function setRecurringInvoice(\Siwapp\RecurringInvoiceBundle\Entity\RecurringInvoice $recurring_invoice)
    {
        $this->recurring_invoice = $recurring_invoice;
    }

    /**
     * Get invoice
     *
     * @return Siwapp\RecurringInvoiceBundle\Entity\RecurringInvoice
     */
    public function getRecurringInvoice()
    {
        return $this->recurring_invoice;
    }

    /**
     * Add taxes
     *
     * @param Siwapp\CoreBundle\Entity\Tax $taxes
     */
    public function addTax(\Siwapp\CoreBundle\Entity\Tax $taxes)
    {
        $this->taxes[] = $taxes;
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
}