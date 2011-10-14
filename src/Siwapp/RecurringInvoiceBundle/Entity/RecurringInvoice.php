<?php

namespace Siwapp\RecurringInvoiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Siwapp\CoreBundle\Entity\AbstractInvoice;

/**
 * Siwapp\RecurringInvoiceBundle\Entity\RecurringInvoice
 *
 * @ORM\Table(indexes={
 *    @ORM\index(name="cstnm_idx", columns={"customer_name"}),
 *    @ORM\index(name="cstid_idx", columns={"customer_identification"}),
 *    @ORM\index(name="cstml_idx", columns={"customer_email"}),
 *    @ORM\index(name="cntct_idx", columns={"contact_person"})
 * })
 * @ORM\Entity(repositoryClass="Siwapp\RecurringInvoiceBundle\Entity\RecurringInvoiceRepository")
 */
class RecurringInvoice extends AbstractInvoice
{
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
     * @ORM\Column(name="max_occurrences", type="integer")
     */
    private $max_occurrences;

    /**
     * @var integer $must_occurrences
     *
     * @ORM\Column(name="must_occurrences", type="integer")
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
     *
     * @ORM\Column(name="starting_date", type="date")
     */
    private $starting_date;

    /**
     * @var date $finishing_date
     *
     * @ORM\Column(name="finishing_date", type="date")
     */
    private $finishing_date;

    /**
     * @var date $last_execution_date
     *
     * @ORM\Column(name="last_execution_date", type="date")
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
        $this->starting_date = $startingDate;
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
        $this->finishing_date = $finishingDate;
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
        $this->last_execution_date = $lastExecutionDate;
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
}