<?php
namespace Siwapp\InvoiceBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

use Siwapp\CoreBundle\Entity\Serie;
use Siwapp\InvoiceBundle\Entity\Invoice;

class InvoiceSaveListener{

    public function prePersist(LifecycleEventArgs $args)
    {//return;
        $em = $args->getEntityManager();
        $entity = $args->getEntity();
        if($entity instanceof Invoice && $entity->needsNumber())
            {
            $entity->setNumber($em->getRepository('SiwappInvoiceBundle:Invoice')->
                               getNextNumber($entity->getSerie()));
        }
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {//return;
        $em = $args->getEntityManager();
        $entity = $args->getEntity();
        if($entity instanceof Invoice && $entity->needsNumber())
        {
            $entity->setNumber($em->getRepository('SiwappInvoiceBundle:Invoice')->
                               getNextNumber($entity->getSerie()));
        }
    }
}