<?php

namespace Siwapp\InvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Util\Inflector;
use Siwapp\CoreBundle\Entity\AbstractInvoice;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Siwapp\InvoiceBundle\Entity\Invoice
 *
 * @ORM\Table(indexes={
 *    @ORM\index(name="invoice_cstnm_idx", columns={"customer_name"}),
 *    @ORM\index(name="invoice_cstid_idx", columns={"customer_identification"}),
 *    @ORM\index(name="invoice_cstml_idx", columns={"customer_email"}),
 *    @ORM\index(name="invoice_cntct_idx", columns={"contact_person"})
 * })
 * @ORM\Entity(repositoryClass="Siwapp\InvoiceBundle\Repository\InvoiceRepository")
 */
class Invoice extends AbstractInvoice
{
    /**
     * @ORM\OneToMany(targetEntity="Item", mappedBy="invoice", orphanRemoval=true)
     */
    private $items;

    /**
     * @ORM\OneToMany(targetEntity="Payment", mappedBy="invoice", orphanRemoval=true)
     *
     */
    private $payments;
  
    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->payments = new ArrayCollection();
    }
   /**
     * @var boolean $draft
     *
     * @ORM\Column(name="draft", type="boolean", nullable="true")
     */
    private $draft;

    /**
     * @var boolean $closed
     *
     * @ORM\Column(name="closed", type="boolean", nullable="true")
     */
    private $closed;

    /**
     * @var boolean $sent_by_email
     *
     * @ORM\Column(name="sent_by_email", type="boolean", nullable="true")
     */
    private $sent_by_email;

    /**
     * @var integer $number
     *
     * @ORM\Column(name="number", type="integer", nullable="true")
     */
    private $number;

    /**
     * @var bigint $recurring_invoice_id
     *
     * @ORM\Column(name="recurring_invoice_id", type="bigint", nullable="true")
     */
    private $recurring_invoice_id;

    /**
     * @var date $issue_date
     *
     * @ORM\Column(name="issue_date", type="date", nullable="true")
     */
    private $issue_date;

    /**
     * @var date $due_date
     *
     * @ORM\Column(name="due_date", type="date", nullable="true")
     * @Assert\Date()
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
        $this->issue_date = $issueDate instanceof \DateTime ?
	  $issueDate: new \DateTime($issueDate);
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
      $this->due_date = $dueDate instanceof \DateTime ? 
	$dueDate : new \DateTime($dueDate);
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

    /**
     * Add items
     *
     * @param Siwapp\InvoiceBundle\Entity\Item $items
     */
    public function addItem(\Siwapp\InvoiceBundle\Entity\Item $items)
    {
        $this->items[] = $items;
    }

    /**
     * Get items
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getItems()
    {
        return $this->items;
    }
    
    /**
     * Add payments
     *
     * @param Siwapp\InvoiceBundle\Entity\Payment $payments
     */
    public function addPayment(\Siwapp\InvoiceBundle\Entity\Payment $payments)
    {
        $this->payments[] = $payments;
    }

    /**
     * Get payments
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /** **************** CUSTOM METHODS AND PROPERTIES **************  */

    public function __toString()
    {
        return (string)$this->number;
    }


    
    const DRAFT    = 0;
    const CLOSED   = 1;
    const OPENED   = 2;
    const OVERDUE  = 3;

    private $series_changed = false;

    public function getDueAmount()
    {
        if($this->status == self::DRAFT)
        {
            return null;
        }
        return $this->gross_amount - $this->paid_amount;
    }

    /**
     * try to catch custom methods to be used in twig templates
     */
    public function __get($name)
    {
        if($name == 'due_amount')
          {
              $m = Inflector::camelize("get_{$name}");
              return $this->$m();
          }
        if(strpos($name, 'tax_amount_') === 0)
        {
            return $this->calculate($name, true);
        }
        return false;
    }

    public function __isset($name)
    {
        if($name == 'due_amount')
        {
            return true;
        }
        if(strpos($name, 'tax_amount_') === 0)
        {
            return true;
        }
        return parent::__isset($name);
    }

    /**
     * When setting series id, we check if there has been a series change,
     * because the invoice number will have to change later
     *
     * TODO: Reiew this method when series object are available
     *
     * @author JoeZ99 <jzarate@gmail.com>
     * 
     */
    public function setSeriesId($value)
    {
        // we check numeric value to prevent loading series by name in the tests
        if($this->getNumber() && $value != $this->series_id &&
           is_numeric($this->series_id) && is_numeric($value))
        {
            $this->series_changed = true;
        }
        parent::setSeriesId($value);
    }

    /**
     * checkStatus
     * checks and sets the status
     *
     * @return Siwapp\InvoiceBundle\Invoice $this
     */
    public function checkStatus()
    {
        if($this->closed || $this->due_amount == 0)
        {
            $this->setStatus(Invoice::CLOSED);
        }
        else
        {
            if($this->due_date > sfDate::getInstance()->format('Y-m-d'))
            {
                $this->setStatus(Invoice::OPENED);
            }
            else
            {
                $this->setStatus(Invoice::OVERDUE);
            }
        }
        return $this;
    }

    public function getStatusString()
    {
        switch($this->status)
        {
          case Invoice::DRAFT;
            $status = 'draft';
             break;
          case Invoice::CLOSED; 
            $status = 'closed';
            break;
          case Invoice::OPENED;
            $status = 'opened';
            break;
          default:
            $status = 'unknown';
            break;  
        }
        return $status;
    }

    public function setAmounts()
    {
        parent::setAmounts();
        $this->setPaidAmount($this->calculate('paid_amount'));

        return $this;
    }



    /* ********** LIFECYCLE CALLBACKS *********** */
    
    /**
     * @ORM\PrePersist
     */
    public function setNextNumber()
    {
        // compute the number of invoice
        if( (!$this->number && $this->status!=self::DRAFT) ||
            ($this->series_changed && !$this->status!=self::DRAFT)
            )
        {
            $this->series_changed = false;
            $this->setNumber($this->id);
        }
    }
}