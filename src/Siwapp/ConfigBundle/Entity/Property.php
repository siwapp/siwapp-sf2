<?php

namespace Siwapp\ConfigBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Siwapp\ConfigBundle\Entity\Property
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Siwapp\ConfigBundle\Entity\PropertyRepository")
 */
class Property
{
    /**
     * @var string $keey
     *
     * @ORM\Column(name="keey", type="string", length=50, unique=true)
     * @ORM\Id
     */
    private $keey;

    /**
     * @var text $value
     *
     * @ORM\Column(name="value", type="text")
     */
    private $value;

    public function __toString()
    {
        return $this->getRawValue();
    }
    
    /**
     * Set keey
     *
     * @param string $keey
     */
    public function setKeey($keey)
    {
        $this->keey = $keey;
    }

    /**
     * Get keey
     *
     * @return string 
     */
    public function getKeey()
    {
        return $this->keey;
    }

    /**
     * Set value
     *
     * @param text $value
     */
    public function setRawValue($value)
    {
        $this->value = $value;
    }
    
    /**
     * Set value with JSON encode
     *
     * @param text $value
     * @author Enrique Martinez
     **/
    public function setValue($value)
    {
        $this->setRawValue(json_encode($value));
    }

    /**
     * Get value
     *
     * @return text 
     */
    public function getRawValue()
    {
        return $this->value;
    }
    
    /**
     * returns the value JSON decoded
     *
     * @return json
     * @author Enrique Martinez
     **/
    public function getValue()
    {
        return json_decode($this->getRawValue(), true);
    }
    
}