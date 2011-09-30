<?php

namespace Siwapp\EstimateBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Siwapp\CoreBundle\Entity\Common;

/**
 * Siwapp\EstimateBundle\Entity\Estimate
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Siwapp\EstimateBundle\Entity\EstimateRepository")
 */
class Estimate extends Common
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean $draft
     *
     * @ORM\Column(name="draft", type="boolean")
     */
    private $draft;

    /**
     * @var integer $number
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var boolean $sent_by_email
     *
     * @ORM\Column(name="sent_by_email", type="boolean")
     */
    private $sent_by_email;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

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
}