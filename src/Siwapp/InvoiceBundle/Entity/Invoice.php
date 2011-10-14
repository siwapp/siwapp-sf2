<?php

namespace Siwapp\InvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Siwapp\CoreBundle\Entity\AbstractInvoice;

/**
 * Siwapp\InvoiceBundle\Entity\Invoice
 *
 * @ORM\Table(indexes={
 *    @ORM\index(name="cstnm_idx", columns={"customer_name"}),
 *    @ORM\index(name="cstid_idx", columns={"customer_identification"}),
 *    @ORM\index(name="cstml_idx", columns={"customer_email"}),
 *    @ORM\index(name="cntct_idx", columns={"contact_person"})
 * })
 * @ORM\Entity(repositoryClass="Siwapp\InvoiceBundle\Entity\InvoiceRepository")
 */
class Invoice extends AbstractInvoice
{
    /**
     * @var boolean $draft
     *
     * @ORM\Column(name="draft", type="boolean")
     */
    private $draft;

    /**
     * @var boolean $closed
     *
     * @ORM\Column(name="closed", type="boolean")
     */
    private $closed;

    /**
     * @var boolean $sent_by_email
     *
     * @ORM\Column(name="sent_by_email", type="boolean")
     */
    private $sent_by_email;

    /**
     * @var integer $number
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var bigint $recurring_invoice_id
     *
     * @ORM\Column(name="recurring_invoice_id", type="bigint")
     */
    private $recurring_invoice_id;

    /**
     * @var date $issue_date
     *
     * @ORM\Column(name="issue_date", type="date")
     */
    private $issue_date;

    /**
     * @var date $due_date
     *
     * @ORM\Column(name="due_date", type="date")
     */
    private $due_date;


    /**
     * Set draft
     *
     * @param boolean $draft
     */
    public function setDraft($draft)
    {
        $this->draft = $draft;
    }

    /**
     * Get draft
     *
     * @return boolean 
     */
    public function getDraft()
    {
        return $this->draft;
    }

    /**
     * Set closed
     *
     * @param boolean $closed
     */
    public function setClosed($closed)
    {
        $this->closed = $closed;
    }

    /**
     * Get closed
     *
     * @return boolean 
     */
    public function getClosed()
    {
        return $this->closed;
    }

    /**
     * Set sent_by_email
     *
     * @param boolean $sentByEmail
     */
    public function setSentByEmail($sentByEmail)
    {
        $this->sent_by_email = $sentByEmail;
    }

    /**
     * Get sent_by_email
     *
     * @return boolean 
     */
    public function getSentByEmail()
    {
        return $this->sent_by_email;
    }

    /**
     * Set number
     *
     * @param integer $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set recurring_invoice_id
     *
     * @param bigint $recurringInvoiceId
     */
    public function setRecurringInvoiceId($recurringInvoiceId)
    {
        $this->recurring_invoice_id = $recurringInvoiceId;
    }

    /**
     * Get recurring_invoice_id
     *
     * @return bigint 
     */
    public function getRecurringInvoiceId()
    {
        return $this->recurring_invoice_id;
    }

    /**
     * Set issue_date
     *
     * @param date $issueDate
     */
    public function setIssueDate($issueDate)
    {
        $this->issue_date = $issueDate;
    }

    /**
     * Get issue_date
     *
     * @return date 
     */
    public function getIssueDate()
    {
        return $this->issue_date;
    }

    /**
     * Set due_date
     *
     * @param date $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->due_date = $dueDate;
    }

    /**
     * Get due_date
     *
     * @return date 
     */
    public function getDueDate()
    {
        return $this->due_date;
    }
}