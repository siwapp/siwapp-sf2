<?php

namespace Siwapp\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siwapp\CoreBundle\Entity\Tax
 *
 * @ORM\Entity
 * @ORM\Table
 */

class Tax
{
  /**
   * @ORM\ManyToMany(targetEntity="CoreItem", mappedBy="taxes")
   */
  private $items;

  public function __construct()
  {
    $this->items = new ArrayCollection();
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
   * @var string $name
   * @ORM\Column
   */
  private $name;
  /**
   * @var string $value
   * @ORM\Column
   */
  private $value;
  /**
   * @var boolean $active
   * @ORM\Column(type="boolean")
   */
  private $active;

  /**
   * @var boolean $is_default
   * @ORM\Column(type="boolean")
   */
  private $is_default;

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value
     *
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set active
     *
     * @param boolean $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set is_default
     *
     * @param boolean $isDefault
     */
    public function setIsDefault($isDefault)
    {
        $this->is_default = $isDefault;
    }

    /**
     * Get is_default
     *
     * @return boolean 
     */
    public function getIsDefault()
    {
        return $this->is_default;
    }

    /**
     * Add items
     *
     * @param Siwapp\CoreBundle\Entity\CoreItem $items
     */
    public function addCoreItem(\Siwapp\CoreBundle\Entity\CoreItem $items)
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}