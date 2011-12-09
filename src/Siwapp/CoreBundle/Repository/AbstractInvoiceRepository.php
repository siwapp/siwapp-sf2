<?php

namespace Siwapp\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Repository class to be inherited by InvoiceRepository, 
 * RecurringInvoiceRepository and EstimateRepository
 */
class AbstractInvoiceRepository extends EntityRepository
{
    /**
     * Update totals for invoices, recurring or estimates 
     * @param ArrayCollection of entities
     * @return AbstractInvoiceRepository
     **/
    public static function updateTotals(ArrayCollection $entities = new ArrayCollection())
    {
        $em = $this->getEntityManager();
        foreach($entity in $entities)
        {
            $entity->setAmounts();
            $em->persist($entity);
        }
        $em->flush();
        return $this;
    }
    
}