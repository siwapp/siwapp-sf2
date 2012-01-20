<?php

namespace Siwapp\ConfigBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PropertyRepository
 *
 */
class PropertyRepository extends EntityRepository
{
    /**
     * Shorthand to get a Property value with optional default value
     *
     * @return mixed
     * @author Enrique Martinez
     **/
    public function get($key, $value = null)
    {
        if ($property =  $this->findOneBy(array('keey' => $key)))
        {
            $value = $property->getValue();
        }
        
        return $value;
    }
    
    /**
     * Shorthand to create or update a Property
     *
     * @return Property
     * @author Enrique Martinez
     **/
    public function setProperty($key, $value = null)
    {
        if (!$property = $this->findOneBy(array('keey' => $key)))
        {
            $property = new Property();
            $property->setKeey($key);
        }
        
        $property->setValue($value);
        
        return $property;
    }
    
    /**
     * Returns an associative array with all the properties
     *
     * @return array
     * @author Enrique Martinez
     **/
    public function getAll()
    {
        $result = array();
        foreach($this->findAll() as $property) {
            $result[$property->getKeey()] = $property->getValue();
        }
        
        return $result;
    }
    
    /**
     * Saves an associative array as properties
     *
     * @return void
     * @author Enrique Martinez
     **/
    public function setPropertiesFromArray($data)
    {
        $em = $this->getEntityManager();
        foreach($data as $k => $v) {
            $property = $this->setProperty($k, $v);
            $em->persist($property);
        }
        $em->flush();
    }
}