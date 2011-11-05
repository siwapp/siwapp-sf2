<?php

namespace Siwapp\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Siwapp\CoreBundle\Entity\CoreItem
 *
 * TODO: Custom methods
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"invoice" = "\Siwapp\InvoiceBundle\Entity\Item", "recurring_invoice" = "\Siwapp\RecurringInvoiceBundle\Entity\Item", "estimate" = "\Siwapp\EstimateBundle\Entity\Item"})
 */
class CoreItem
{

  /**
   * @var ArrayCollection $taxes
   *
   * @ORM\ManyToMany(targetEntity="Tax", mappedBy="items")
   */
  private $taxes;

  public function __construct()
  {
    $this->taxes = new ArrayCollection();
  }

  /**
   * @var integer $id
   *
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var integer $quantity
   *
   * @ORM\Column(type="integer")
   */
  private $quantity;

  /**
   * @var decimal $discount
   *
   * @ORM\Column(type="decimal", scale="2")
   */
  private $discount;

  /** 
   * @var string $description 
   *
   * @ORM\Column()
   */
  private $description;

  /**
   * @var decimal $unitary_cost
   *
   * @ORM\Column(type="decimal")
   */
  private $unitary_cost;

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
   * Get quantity
   *
   * @return integer 
   */
  public function getQuantity()
  {
    return $this->quantity;
  }

  /**
   * Set Quantity
   *
   * @param integer $quantity
   */
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }

  /**
   * Get discount
   *
   * @return decimal 
   */
  public function getDiscount()
  {
    return $this->discount;
  }

  /**
   * Set Discount
   *
   * @param decimal $discount
   */
  public function setDiscount($discount)
  {
    $this->discount = $discount;
  }

  /**
   * Get description
   *
   * @return string 
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set description
   *
   * @param string $description
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }

  /**
   * Get unitary cost
   *
   * @return decimal 
   */
  public function getUnitaryCost()
  {
    return $this->unitary_cost;
  }

  /**
   * Set unitary cost
   *
   * @param decimal $unitary_cost
   */
  public function setUnitaryCost($unitary_cost)
  {
    $this->unitary_cost = $unitary_cost;
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