<?php

namespace Siwapp\RecurringInvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Siwapp\CoreBundle\Entity\AbstractInvoice;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Siwapp\RecurringInvoiceBundle\Entity\RecurringInvoice
 *
 * @ORM\Table(indexes={
 *    @ORM\index(name="recurring_cstnm_idx", columns={"customer_name"}),
 *    @ORM\index(name="recurring_cstid_idx", columns={"customer_identification"}),
 *    @ORM\index(name="recurring_cstml_idx", columns={"customer_email"}),
 *    @ORM\index(name="recurring_cntct_idx", columns={"contact_person"})
 * })
 * @ORM\Entity(repositoryClass="Siwapp\RecurringInvoiceBundle\Entity\RecurringInvoiceRepository")
 */
class RecurringInvoice extends AbstractInvoice
{
  /**
   *   @ORM\OneToMany(targetEntity="Item", mappedBy="recurring_invoice")
   */
  private $items;

  public function __construct()
  {
    $this->items = new ArrayCollection();
  }

    /**
     * @var integer $days_to_due
     *
     * @ORM\Column(name="days_to_due", type="integer")
     */
    private $days_to_due;

    /**
     * @var boolean $enabled
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var integer $max_occurrences
     *
     * @ORM\Column(name="max_occurrences", type="integer", nullable="true")
     */
    private $max_occurrences;

    /**
     * @var integer $must_occurrences
     *
     * @ORM\Column(name="must_occurrences", type="integer", nullable="true")
     */
    private $must_occurrences;

    /**
     * @var integer $period
     *
     * @ORM\Column(name="period", type="integer")
     */
    private $period;

    /**
     * @var string $period_type
     *
     * @ORM\Column(name="period_type", type="string", length=8)
     */
    private $period_type;

    /**
     * @var date $starting_date
     * @Assert\Date()
     * @ORM\Column(name="starting_date", type="date")
     */
    private $starting_date;

    /**
     * @var date $finishing_date
     *
     * @ORM\Column(name="finishing_date", type="date", nullable="true")
     * @Assert\Date()
     */
    private $finishing_date;

    /**
     * @var date $last_execution_date
     *
     * @ORM\Column(name="last_execution_date", type="date", nullable="true")
     * @Assert\Date()
     */
    private $last_execution_date;


    /**
     * Set days_to_due
     *
     * @param integer $daysToDue
     */
    public function setDaysToDue($daysToDue)
    {
      $this->days_to_due = $daysToDue;
    }

    /**
     * Get days_to_due
     *
     * @return integer 
     */
    public function getDaysToDue()
    {
        return $this->days_to_due;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set max_occurrences
     *
     * @param integer $maxOccurrences
     */
    public function setMaxOccurrences($maxOccurrences)
    {
        $this->max_occurrences = $maxOccurrences;
    }

    /**
     * Get max_occurrences
     *
     * @return integer 
     */
    public function getMaxOccurrences()
    {
        return $this->max_occurrences;
    }

    /**
     * Set must_occurrences
     *
     * @param integer $mustOccurrences
     */
    public function setMustOccurrences($mustOccurrences)
    {
        $this->must_occurrences = $mustOccurrences;
    }

    /**
     * Get must_occurrences
     *
     * @return integer 
     */
    public function getMustOccurrences()
    {
        return $this->must_occurrences;
    }

    /**
     * Set period
     *
     * @param integer $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * Get period
     *
     * @return integer 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set period_type
     *
     * @param string $periodType
     */
    public function setPeriodType($periodType)
    {
        $this->period_type = $periodType;
    }

    /**
     * Get period_type
     *
     * @return string 
     */
    public function getPeriodType()
    {
        return $this->period_type;
    }

    /**
     * Set starting_date
     *
     * @param date $startingDate
     */
    public function setStartingDate($startingDate)
    {
      $this->starting_date = $startingDate instanceof \DateTime ?
	$startingDate: new \DateTime($startingDate);
    }

    /**
     * Get starting_date
     *
     * @return date 
     */
    public function getStartingDate()
    {
        return $this->starting_date;
    }

    /**
     * Set finishing_date
     *
     * @param date $finishingDate
     */
    public function setFinishingDate($finishingDate)
    {
      $this->finishing_date = $finishingDate instanceof \DateTime ?
	$finishingDate: new \DateTime($finishingDate);
    }

    /**
     * Get finishing_date
     *
     * @return date 
     */
    public function getFinishingDate()
    {
        return $this->finishing_date;
    }

    /**
     * Set last_execution_date
     *
     * @param date $lastExecutionDate
     */
    public function setLastExecutionDate($lastExecutionDate)
    {
      $this->last_execution_date = $lastExecutionDate instanceof \DateTime ?
	$lastExecutionDate: new \DateTime($lastExecutionDate);
    }

    /**
     * Get last_execution_date
     *
     * @return date 
     */
    public function getLastExecutionDate()
    {
        return $this->last_execution_date;
    }


    /** ***************** RELATIONSHIP METHODS *********** **/

    /** 
     * Add items
     * To be called from the ancestor's "addItem" method
     *
     * @param Siwapp\RecurringInvoiceBundle\Entity\Item $item
     */
    public function addNewItem(\Siwapp\RecurringInvoiceBundle\Entity\Item $item)
    {
      $this->items[] = $item;
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
     * Remove an item from the item collection
     * To be called from ancestor's removeItem method
     *
     * @param mixed $mixed \Siwapp\RecurringInvoiceBundle\Entity\Item or integer
     */

    public function removeThisItem($mixed = null)
    {
        if ($mixed instanceof \Siwapp\RecurringInvoiceBundle\Entity\Item)
        {
            foreach($this->items as $ref => $item)
            {
                if($item === $mixed)
                {
                    unset($this->items[$ref]);
                    break;
                }
            }
        }
        else if(is_int($mixed))
        {
            unset($this->items[$mixed]);
        }
    }

    /** ********** CUSTOM METHODS AND PROPERTIES ************** **/
    /**
     * TODO: provide the series.
     */
    public function __toString()
    {
        return (string) "Recurring Invoice: ".$this->id;
    }

    const INACTIVE = 0;
    const FINISHED = 1;
    const ACTIVE = 2;
    const PENDING = 3;

    /**
     * get occurrences. get the number of invoices this recurring has generated
     *
     * @return integer the number of invoices generated
     */
    public function getOccurrences()
    {
        return count($this->getInvoices());
    }

    /**
     * Gets the number of the pending invoices to be generated
     * by this recurring at the actual date
     *
     * @return integer the number of pending invoices
     */
    public function countPendingInvoices()
    {
        return ($this->must_occurrences - $this->getOcurrences());
    }

    /**
     * checks and sets the number of invoices that should have been
     * generated until the day specified in args
     *
     * @param \DateTime $today
     */
    public function checkMustOccurrences(\DateTime $today = null)
    {
        if(!$today) $today = new \DateTime();
        $starting_date = $this->getStartingDate();
        $finishing_date = $this->getFinishingDate();
        // TODO : FINISH THIS METHODD!!!
        if($today > $starting_date) 
        {
            $check_date = $finishing_date ? 
                ($today > $finishing_date ? $finishing_date: $today) : $today;

            switch($this->period_type)
            {
            case 'year':
                $unit = 'y';
                break;
            case 'month':
                $unit = 'm';
                break;
            case 'week':
            case 'day':
                $unit = 'a';
                break;
            }

            $difference = $check_date->diff($starting_date)->format($unit);

            if($this->period_type == 'week')
            {
                $difference /= 7;
            }
            $must_occurrences = floor($difference / $this->period) +1;

            
            // if there's already a must_occurreces and is greater
            // then set this as must_occurences
            if($this->must_occurrences && 
               $must_occurrences > $this->must_occurrences)
            {
                $must_occurrences = $this->must_occurrences;
            }
            $this->must_occurrences = $must_occurrences;
        }
        else
        {
            $this->must_occurrences = 0;
        }
    }

    /**
     * checks and sets the status
     *
     * @return RecurringInvoice $this
     */
    public function checkStatus()
    {
        $this->checkMustOccurrences();
        //TODO : End this
    }
}