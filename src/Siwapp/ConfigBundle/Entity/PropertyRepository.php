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
     * @return void
     * @author Enrique Martinez
     **/
    public function set($key, $value = null)
    {
        if (!$property = $this->findOneBy(array('keey' => $key)))
        {
            $property = new Property();
            $property->setKeey($key);
        }
        
        $property->setValue($value);
        
        $em = $this->getEntityManager();
        $em->persist($property);
        $em->flush();
    }
}