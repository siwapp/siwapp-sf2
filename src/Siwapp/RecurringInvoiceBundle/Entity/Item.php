<?php

namespace Siwapp\RecurringInvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
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
}