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
    public function updateTotals()
    {
        $em = $this->getEntityManager();
        foreach($em->createQuery('SELECT i from '.$this->getEntityName().'  i')->getResult() as $entity)
        {
            $entity->setAmounts();
            $em->persist($entity);
        }
        $em->flush();
        return $this;
    }
    
}