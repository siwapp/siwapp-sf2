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
        if ($p =  $this->findOneBy(array('keey' => $key)))
        {
            $value = $p->getValue();
        }
        
        return $value;
    }
}