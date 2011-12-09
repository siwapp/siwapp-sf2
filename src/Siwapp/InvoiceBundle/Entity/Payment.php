<?php

namespace Siwapp\InvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Siwapp\InvoiceBundle\Entity\Payment
 *
 * @ORM\Entity
 * @ORM\Table()
 */
class Payment
{
    /**
     * @var integer $id
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="payments")
     *
     */
    private $invoice;

    /**
     * @var date $date
     *
     * @ORM\Column(name="date", type="date", nullable="true")
     */
    private $date;

    /**
     * @var decimal $amount
     *
     * @ORM\Column(name="amount", type="decimal", scale="3", precision="15", nullable="true")
     */
    private $amount;

    /**
     * @var text $notes
     *
     * @ORM\Column(name="notes", type="text", nullable="true")
     */
    private $notes;

    /**
     * Set issue_date
     *
     * @param date $date
     */
    public function setDate($date)
    {
        $this->date = $date instanceof \DateTime ?
	  $date: new \DateTime($date);
    }

    /**
     * Get date
     *
     * @return date 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set amount
     *
     * @param decimal $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Get amount
     *
     * @return decimal 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set notes
     *
     * @param text $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * Get notes
     *
     * @return text 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set invoice
     *
     * @param Siwapp\InvoiceBundle\Entity\Invoice $invoice
     */
    public function setInvoice(\Siwapp\InvoiceBundle\Entity\Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Get invoice
     *
     * @return Siwapp\InvoiceBundle\Entity\Invoice 
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}