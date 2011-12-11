<?php

namespace Siwapp\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Util\Inflector;
use Gedmo\Sluggable\Util\Urlizer as Urlizer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Siwapp\CoreBundle\Entity\AbstractItem
 *
 * TODO: Custom methods
 * @ORM\MappedSuperclass
 */
class AbstractItem
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
   * @var integer $quantity
   *
   * @ORM\Column(type="integer")
   */
  private $quantity;

  /**
   * @var decimal $discount
   *
   * @ORM\Column(type="decimal", precision="5", scale="2")
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
   * @ORM\Column(type="decimal", precision="15", scale="3")
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

    /**
     * Get base amount
     *
     * @return float gross price of the item (times quantity)
     */
    public function getBaseAmount()
    {
        return $this->unitary_cost*$this->quantity;
    }

    /**
     * Get net amount
     *
     * @return float price with discount
     */
    public function getNetAmount()
    {
        return $this->getBaseAmount() - $this->getDiscountAmount();
    }

    /**
     * Get discount amount
     *
     * @return float amount to discount
     */
    public function getDiscountAmount()
    {
        return $this->getBaseAmount() * $this->discount / 100;
    }

    /**
     * Get tax amount
     *
     * @param array tax_names. if present, returns the amount for those taxes
     * @return float amount to tax
     */
    public function getTaxAmount($tax_names = null)
    {
        return $this->getNetAmount() * $this->getTaxesPercent($tax_names) / 100;
    }

    /**
     * Get gross amount
     *
     * @return float amount to pay after discount and taxes
     */
    public function getGrossAmount()
    {
        return $this->getNetAmount() + $this->getTaxAmount();
    }

    /**
     * Get taxes percent
     *
     * @param tax_names array if present shows only percent of those taxes
     * @return integer total percent of taxes to apply
     */
    public function getTaxesPercent($tax_names = null)
    {
        $tax_names = $tax_names ? 
            (is_array($tax_names) ?
             array_map(array('Urlizer', 'urlize'), $tax_names):
             array(Urlizer::urlize($tax_names))) :
            null;

        $total = 0;
        foreach($this->getTaxes() as $tax){
            if(!$tax_names ||
               in_array(Urlizer::urlize($tax->getName()), $tax_names))
             {
                 $total += $tax->getValue();
             }
        }
        return $total;
    }

    /**
     * Try to capture a "getTaxAmountTAXNAME" method.
     * This is to be able to use 'invoice.tax_amount_TAXNAME' in the templates
     *
     * @author JoeZ99 <jzarate@gmail.com>
     */
    public function __call($data, $argument)
    {
        if(strpos($data, 'getTaxAmount') === 0 && strlen($data)>12)
        {
            $tax_name = substr($data, 12);
            return $this->getTaxAmount($tax_name);
        }
        return false;
    }

    /**
     * Again, capture hipothetical {{invoice.base_amount}} and the like
     *
     */
    public function __get($name)
    {
        if(in_array($name, array('base_amount', 'discount_amount', 'net_amount', 'tax_amount', 'gross_amount')))
        {
            $m = Inflector::camelize("get_{$name}");
            return $this->$m();
        }
        return false;
    }
    
    /**
     * Twig template system needs this to answer true for the specified properties
     */
    public function __isset($name)
    {
        if(in_array($name, array('base_amount', 'discount_amount', 'net_amount', 'tax_amount', 'gross_amount')))
        {
            return true;
        }
        return false;
    }


    
}